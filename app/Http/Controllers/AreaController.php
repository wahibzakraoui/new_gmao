<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAreaRequest;
use Illuminate\Http\Request;
use App\Models\Factory;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\View;
use App\Exceptions\PermissionDeniedException;
use App\Models\Area;
use Illuminate\Support\Str;

class AreaController extends Controller
{
    private $module = "areas";

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

        return DataTables::of(Area::leftJoin('factories', 'areas.factory_id', '=', 'factories.id')->select([
            'areas.id', 
            'areas.name', 
            'areas.description',
            'factories.name as factoryName',
            'areas.active',
        ]))
        ->addColumn('actions', function ($area) {
            return View::make("pages.{$this->module}.datatables.actions")->with('area', $area)->render();;
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
        return view("pages.{$this->module}.add")
        ->with('factoriesList', Factory::All()->pluck('name', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateAreaRequest $request)
    {
        if(!auth()->user()->can("create {$this->module}")){
            throw new PermissionDeniedException($request);
        }
        $request->validated();
        if(Area::create([
            'uuid' => Str::uuid(),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'factory_id' => $request->get('factory_id'),
            'active' => $request->get('active') ?? false,
        ]))
        {
            return redirect($this->module)->with('success', 'Area added successfully!');
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
    public function edit(Request $request ,Area $area)
    {
        if(!auth()->user()->can("edit {$this->module}")){
            throw new PermissionDeniedException($request);
        }
        return view("pages.{$this->module}.edit")
        ->with(Str::singular($this->module), $area->firstOrFail())
        ->with('factoriesList', Factory::All()->pluck('name', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAreaRequest $request, Area $area)
    {
        /* User does not have permission */
        if(!auth()->user()->can("edit {$this->module}")){
            throw new PermissionDeniedException($request);
        }else{
            /* User does have permission */
            $request->validated();
            if($area->firstOrFail()->update($request->all()))
            {
                return redirect($this->module)->with('success', 'Area edited successfully!');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Area $area)
    {
        if(!auth()->user()->can("delete {$this->module}")){
            throw new PermissionDeniedException($request);
        }else{
            if($area->firstOrFail()->delete()){
                return redirect($this->module)->with('deleted', true)->with('success', 'Area deleted successfully!');
            }
        }

    }

}
