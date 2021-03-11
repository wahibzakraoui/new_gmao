<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePartRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Http\Requests\CreateEquipmentRequest;
use App\Http\Requests\UpdatePartRequest;
use App\Models\AreaCode;
use App\Models\Criticity;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Redirector;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\View;
use App\Exceptions\PermissionDeniedException;
use App\Models\Area;
use App\Models\Equipment;
use App\Models\Part;
use Illuminate\Support\Str;

class PartController extends Controller
{
    private string $module = "parts";

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     * @throws PermissionDeniedException
     */
    public function index(Request $request) : Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'view', $this->module);

        return response(
            view("pages.{$this->module}.index")
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws PermissionDeniedException
     */
    public function list(Request $request) : JsonResponse{

        /* check if User does not have permission */
        $this->checkPerms($request, 'view', $this->module);

        try {
            return DataTables::of(Part::leftJoin('areas', 'parts.area_id', '=', 'areas.id')
                ->leftJoin('equipment', 'equipment.id', '=', 'parts.equipment_id')
                ->select([
                    'parts.id',
                    'parts.name',
                    'parts.code',
                    'parts.complementary_code',
                    'areas.name as areaName',
                    'parts.area_code',
                    'equipment.name as equipmentName',
                    'parts.equipment_code',
                    'parts.active',
                ]))
                ->addColumn('actions', function ($part) {
                    return View::make("pages.{$this->module}.datatables.actions")->with('part', $part)->render();
                })
                ->rawColumns(['actions'])
                ->make(true);
        } catch (Exception $e) {
            return response()->json([]);
        }
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

        return response(
            view("pages.{$this->module}.add")
                ->with('areasList', Area::All()->pluck('name', 'id')->prepend(''))
                ->with('equipmentList', Equipment::getList()->prepend(''))
                ->with('criticitiesList', Criticity::All()->pluck('name', 'id')->prepend(''))
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePartRequest $request
     * @return Application|RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     */
    public function store(CreatePartRequest $request)
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'create', $this->module);

        $request->validated();
        $part = Part::create([
            'uuid' => Str::uuid(),
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            'complementary_code' => $request->get('complementary_code'),
            'area_id' => $request->get('area_id'),
            'area_code' => $request->get('area_code'),
            'equipment_id' => $request->get('equipment_id'),
            'equipment_code' => Equipment::find($request->get('equipment_id'))->firstOrFail()->code,
            'active' => $request->get('active') ?? false,

        ]);

        if($part)
        {
            if($request->hasFile('photo')){
                try {
                    $part->addMedia($request->file('photo'))->toMediaCollection('parts');
                }catch (Exception $e){
                    /* don't do anything ? */
                }
            }
            return redirect($this->module)->with('success', __('parts.part_added_success'));
        }
        return redirect($this->module);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws PermissionDeniedException
     * @todo Return a working view
     */
    public function show(Request $request, int $id): Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'view', $this->module);

        return response(
            view('dashboard')->with('id', $id)
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Part $part
     * @return Response
     * @throws PermissionDeniedException
     */
    public function edit(Request $request , Part $part): Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'edit', $this->module);

        return response(
            view("pages.{$this->module}.edit")
                ->with(Str::singular($this->module), $part)
                ->with('areasList', Area::All()->pluck('name', 'id'))
                ->with('equipmentList', Equipment::All()->pluck('name', 'id'))
                ->with('criticitiesList', Criticity::All()->pluck('name', 'id'))
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePartRequest $request
     * @param Part $part
     * @return Application|RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     */
    public function update(UpdatePartRequest $request, Part $part)
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'edit', $this->module);

        /* User does have permission */
        $request->validated();
        if($part->update($request->only(['name', 'code', 'complementary_code', 'criticity_id', 'equipment_id', 'area_id', 'area_code', 'active'])))
        {
            if($request->hasFile('photo')){
                $part->clearMediaCollection('parts');
                try {
                    $part->addMedia($request->file('photo'))
                        ->toMediaCollection('parts');
                } catch (FileDoesNotExist | FileIsTooBig $e) {
                }
            }
            return redirect($this->module.'/edit/'.$part->id)->with('success', __('parts.part_edited_success'));
        }
        return redirect($this->module);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Part $part
     * @return Application|RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     * @throws Exception
     */
    public function destroy(Request $request, Part $part)
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'delete', $this->module);

        if($part->delete()){
            return redirect($this->module)->with('deleted', true)->with('success', 'Part deleted successfully!');
        }

        return redirect($this->module);
    }
}
