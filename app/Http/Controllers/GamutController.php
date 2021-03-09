<?php

namespace App\Http\Controllers;

use App\Models\Gamut;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
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
use DB;

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
                     DB::raw("CONCAT(equipment.name,' - ',equipment.area_code) AS equipmentName"),
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
        } catch (Exception $e) {
        }
        return response()->json([]);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Gamut $gamut
     * @return Response
     * @throws PermissionDeniedException
     * @todo Return a working view
     */
    public function show(Request $request, Gamut $gamut): Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'view', $this->module);

        return response(
            view("pages.{$this->module}.show")
            ->with('gamut', $gamut)
            ->with('gamut_all_work_orders_count', $gamut->work_orders->count() ?: 1)
            ->with('gamut_done_work_orders_count', $gamut->done->count() ?: 0)
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     * @throws PermissionDeniedException
     */
    public function create(Request $request): Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'create', $this->module);

        return response(view("pages.{$this->module}.add")
            ->with('factoriesList', Factory::All()->pluck('name', 'id'))
            ->with('areasList', Area::All()->pluck('name', 'id'))
            ->with('periodicitiesList', Periodicity::select([DB::raw("CONCAT(name,' - ',description) AS name"),'id'])->pluck('name', 'id'))
            ->with('servicesList', Service::All()->pluck('name', 'id'))
            ->with('partsList', Part::select([DB::raw("CONCAT(name,' - ',code) AS name"),'id'])->pluck('name', 'id')->prepend([0 =>'Select if applicable']))
            ->with('usersList', User::All()->pluck('name', 'id')->prepend([''=>'Assign to...']))
            ->with('equipmentList', Equipment::select([DB::raw("CONCAT(name,' - ',code) AS name"),'id'])->pluck('name', 'id'))
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateGamutRequest $request
     * @param Gamut $gamut
     * @return RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     */
    public function store(CreateGamutRequest $request, Gamut $gamut)
    {
        /* User does not have permission */
        $this->checkPerms($request, 'create', $this->module);

        /* User does have permission */
        $request->validated();
        if($gamut->create(
            [
                'uuid' => Str::uuid(),
                'designation' => $request->get('designation'),
                'code' => $request->get('code'),
                'state' => $request->get('state'),
                'type' => $request->get('type'),
                'factory_id' => $request->get('factory_id'),
                'equipment_id' => $request->get('equipment_id'),
                'part_id' => $request->get('part_id'),
                'area_id' => $request->get('area_id'),
                'periodicity_id' => $request->get('periodicity_id'),
                'estimated_hours' => $request->get('estimated_hours'),
                'service_id' => $request->get('service_id'),
                'assigned_user_id' => $request->get('assigned_user_id'),
                'active' => $request->get('active') ?? false,
            ]
        ))
        {
            return redirect($this->module)->with('success', 'Gamut created successfully!');
        }
        return redirect('gamuts');
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
        $this->checkPerms($request,'edit', $this->module);
        //ray(Equipment::All()->pluck('name', 'id'));
        return response(view("pages.{$this->module}.edit")
            ->with(Str::singular($this->module), $gamut)
            ->with('factoriesList', Factory::All()->pluck('name', 'id'))
            ->with('areasList', Area::All()->pluck('name', 'id'))
            ->with('periodicitiesList', Periodicity::select([DB::raw("CONCAT(name,' - ',description) AS name"),'id'])->pluck('name', 'id'))
            ->with('servicesList', Service::All()->pluck('name', 'id'))
            ->with('partsList', Part::select([DB::raw("CONCAT(name,' - ',code) AS name"),'id'])->pluck('name', 'id')->prepend([0 =>'Select if applicable']))
            ->with('usersList', User::All()->pluck('name', 'id')->prepend([''=>'Assign to...']))
            ->with('equipmentList', Equipment::select([DB::raw("CONCAT(name,' - ',code) AS name"),'id'])->pluck('name', 'id'))
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGamutRequest $request
     * @param Gamut $gamut
     * @return RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     */
    public function update(UpdateGamutRequest $request, Gamut $gamut)
    {
        /* User does not have permission */
        $this->checkPerms($request,'edit', $this->module);

        /* User does have permission */
        $request->validated();
        if($gamut->update(
                [
                    'designation' => $request->get('designation'),
                    'code' => $request->get('code'),
                    'state' => $request->get('state'),
                    'type' => $request->get('type'),
                    'factory_id' => $request->get('factory_id'),
                    'equipment_id' => $request->get('equipment_id'),
                    'part_id' => $request->get('part_id'),
                    'area_id' => $request->get('area_id'),
                    'periodicity_id' => $request->get('periodicity_id'),
                    'estimated_hours' => $request->get('estimated_hours'),
                    'service_id' => $request->get('service_id'),
                    'assigned_user_id' => $request->get('assigned_user_id'),
                    'active' => $request->get('active') ?? false,
                ]
            ))
        {
            return redirect($this->module)->with('success', 'Gamut edited successfully!');
        }
        return redirect('gamuts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Gamut $gamut
     * @return RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     * @throws Exception
     * @noinspection NotOptimalIfConditionsInspection
     */
    public function destroy(Request $request, Gamut $gamut)
    {
        $this->checkPerms($request,'delete', $this->module);

        if($gamut->work_orders()->delete() && $gamut->delete()){
            return redirect($this->module)->with('deleted', true)->with('success', 'Gamut deleted successfully!');
        }
        return redirect('gamuts');
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
