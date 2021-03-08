<?php

namespace App\Http\Controllers;

use App\Models\Gamut;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
use App\Http\Requests\UpdateGamutRequest;
use App\Http\Requests\CreateGamutRequest;
use App\Models\Factory;
use Yajra\DataTables\Facades\DataTables;
use App\Exceptions\PermissionDeniedException;
use App\Models\Area;
use App\Models\AreaCode;
use App\Models\Equipment;
use App\Models\Part;
use App\Models\Periodicity;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class GamutController extends Controller
{
    private string $module = "gamuts";

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     * @throws PermissionDeniedException
     */
    public function index(Request $request): Response
    {
        /* User does not have permission */
        $this->checkPerms($request,'view', $this->module);
        return response(
            view("pages.{$this->module}.index")
        );
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws PermissionDeniedException
     */
    public function list(Request $request): JsonResponse{

        /* User does not have permission */
        $this->checkPerms($request,'view', $this->module);

        try {
            return DataTables::of(Gamut::leftJoin('factories', 'gamuts.factory_id', '=', 'factories.id')
                ->leftJoin('equipment', 'gamuts.equipment_id', 'equipment.id')
                ->leftJoin('areas', 'gamuts.area_id', 'areas.id')
                ->leftJoin('periodicities', 'gamuts.periodicity_id', 'periodicities.id')
                ->leftJoin('services', 'gamuts.service_id', 'services.id')
                ->select([
                    'gamuts.id',
                    'gamuts.designation',
                    'gamuts.code',
                    'equipment.name as equipmentName',
                    'areas.name as areaName',
                    'gamuts.state',
                    'gamuts.type',
                    'services.name as serviceName',
                    'periodicities.name as periodicityName',
                    'gamuts.next_run',
                    'gamuts.active',
                ]))
                ->addColumn('next_run', function ($gamut) {
                    return Carbon::parse($gamut->next_run)->diffForHumans();
                })
                ->addColumn('actions', function ($gamut) {
                    return View::make("pages.{$this->module}.datatables.actions")->with('gamut', $gamut)->render();
                })
                ->make(true);
        } catch (\Exception $e) {
        }
        return response()->json([]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Gamut $gamut
     * @return Response
     * @throws PermissionDeniedException
     */
    public function edit(Request $request , Gamut $gamut) : Response
    {
        if(!auth()->user()->can("edit {$this->module}")){
            throw new PermissionDeniedException($request);
        }
        return response(view("pages.{$this->module}.edit")
            ->with(Str::singular($this->module), $gamut)
            ->with('factoriesList', Factory::All()->pluck('name', 'id'))
            ->with('areasList', Area::All()->pluck('name', 'id'))
            ->with('periodicitiesList', Periodicity::All()->pluck('name', 'id'))
            ->with('servicesList', Service::All()->pluck('name', 'id'))
            ->with('partsList', Part::All()->pluck('name', 'id')->prepend([''=>'Select if applicable']))
            ->with('usersList', User::All()->pluck('name', 'id')->prepend([''=>'Assign to...']))
            ->with('equipmentList', Equipment::All()->pluck('name', 'id'))
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, Gamut $gamut)
    {
        if(!auth()->user()->can("delete {$this->module}")){
            throw new PermissionDeniedException($request);
        }else{
            if($gamut->delete()){
                return redirect($this->module)->with('deleted', true)->with('success', 'Gamut deleted successfully!');
            }
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateGamutRequest $request, Gamut $gamut)
    {
        /* User does not have permission */
        if(!auth()->user()->can("edit {$this->module}")){
            throw new PermissionDeniedException($request);
        }else{
            /* User does have permission */
            $request->validated();
            if($gamut->update($request->only(
                    [
                        'designation',
                        'code',
                        'state',
                        'type',
                        'factory_id',
                        'equipment_id',
                        'part_id',
                        'area_id',
                        'periodicity_id',
                        'estimated_hours',
                        'service_id',
                        'assigned_user_id',
                        'active'
                    ]
                )))
            {
                return redirect($this->module)->with('success', 'Gamut edited successfully!');
            }
        }

    }


    public function pdf(Request $request, Gamut $gamut)
    {
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view::make('pdf.wo1'));

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();
        $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));
    }
}
