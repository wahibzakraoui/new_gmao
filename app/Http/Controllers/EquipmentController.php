<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEquipmentRequest;
use App\Http\Requests\CreateEquipmentRequest;
use Illuminate\Http\Request;
use App\Models\Factory;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\View;
use App\Exceptions\PermissionDeniedException;
use App\Models\Area;
use App\Models\AreaCode;
use App\Models\Equipment;
use Illuminate\Support\Str;

class EquipmentController extends Controller
{
    private $module = "equipments";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /* User does not have permission */
        if(!auth()->user()->can("view {$this->module}")){
            throw new PermissionDeniedException($request);
        }
        return view("pages.{$this->module}.index");
    }

    public function list(Request $request){

        /* User does not have permission */
        if(!auth()->user()->can("view {$this->module}")){
            throw new PermissionDeniedException($request);
        }

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
            return View::make("pages.{$this->module}.datatables.actions")->with('equipment', $equipment)->render();;
        })
        ->rawColumns(['actions'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /* User does not have permission */
        if(!auth()->user()->can("create {$this->module}")){
            throw new PermissionDeniedException($request);
        }
        ray(Area::All()->pluck('name', 'id')->prepend(['' => ''])[0]);
        return view("pages.{$this->module}.add")
        ->with('areasList', Area::All()->pluck('name', 'id')->prepend(['' => '']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEquipmentRequest $request)
    {
        if(!auth()->user()->can("create {$this->module}")){
            throw new PermissionDeniedException($request);
        }

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
            return redirect($this->module)->with('success', 'Equipment added successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if(!auth()->user()->can("view {$this->module}")){
            throw new PermissionDeniedException($request);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request , Area $area)
    {
        if(!auth()->user()->can("edit {$this->module}")){
            throw new PermissionDeniedException($request);
        }
        return view("pages.{$this->module}.edit")
        ->with(Str::singular($this->module), $area)
        ->with('areasList', Area::All()->pluck('name', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {
        /* User does not have permission */
        if(!auth()->user()->can("edit {$this->module}")){
            throw new PermissionDeniedException($request);
        }else{
            /* User does have permission */
            $request->validated();
            if($equipment->update($request->only(['name', 'code', 'description', 'active', 'area_id'])))
            {
                return redirect($this->module)->with('success', 'Equipment edited successfully!');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Equipment $equipment)
    {
        if(!auth()->user()->can("delete {$this->module}")){
            throw new PermissionDeniedException($request);
        }else{
            if($equipment->delete()){
                return redirect($this->module)->with('deleted', true)->with('success', 'Equipment deleted successfully!');
            }
        }

    }
}
