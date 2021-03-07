<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEquipmentRequest;
use App\Http\Requests\CreateEquipmentRequest;
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
use Illuminate\Support\Str;

class EquipmentController extends Controller
{
    private string $module = "equipments";

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
            return DataTables::of(Equipment::leftJoin('areas', 'equipment.area_id', '=', 'areas.id')
                ->select([
                    'equipment.id',
                    'equipment.name',
                    'equipment.code',
                    'equipment.description',
                    'equipment.area_code',
                    'areas.name as areaName',
                    'equipment.active',
                ]))
                ->addColumn('actions', function ($equipment) {
                    return View::make("pages.{$this->module}.datatables.actions")->with('equipment', $equipment)->render();
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
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateEquipmentRequest $request
     * @return Application|RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     */
    public function store(CreateEquipmentRequest $request)
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'create', $this->module);

        $request->validated();
        $equipment = Equipment::create([
            'uuid' => Str::uuid(),
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            'description' => $request->get('description'),
            'area_id' => $request->get('area_id'),
            'area_code' => $request->get('area_code'),
            'active' => $request->get('active') ?? false,

        ]);

        if($equipment)
        {
            if($request->hasFile('photo')){
                try {
                    $equipment->addMedia($request->file('photo'))->toMediaCollection('equipment');
                }catch (Exception $e){
                    /* don't do anything ? */
                }
            }
            return redirect($this->module)->with('success', 'Equipment added successfully!');
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
     * @param Equipment $equipment
     * @return Response
     * @throws PermissionDeniedException
     */
    public function edit(Request $request , Equipment $equipment): Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'edit', $this->module);

        return response(
            view("pages.{$this->module}.edit")
                ->with(Str::singular($this->module), $equipment)
                ->with('areasList', Area::All()->pluck('name', 'id'))
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEquipmentRequest $request
     * @param Equipment $equipment
     * @return Application|RedirectResponse|Response|Redirector
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     * @throws PermissionDeniedException
     */
    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'edit', $this->module);

        /* User does have permission */
        $request->validated();
        if($equipment->update($request->only(['name', 'code', 'description', 'active', 'area_id', 'area_code'])))
        {
            if($request->hasFile('photo')){
                $equipment->clearMediaCollection('equipment');
                $equipment->addMedia($request->file('photo'))
                ->toMediaCollection('equipment');
            }
            return redirect($this->module.'/edit/'.$equipment->id)->with('success', 'Equipment edited successfully!');
        }
        return redirect($this->module);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Equipment $equipment
     * @return Application|RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     * @throws Exception
     */
    public function destroy(Request $request, Equipment $equipment)
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'delete', $this->module);

        if($equipment->delete()){
            return redirect($this->module)->with('deleted', true)->with('success', 'Equipment deleted successfully!');
        }

        return redirect($this->module);
    }
}
