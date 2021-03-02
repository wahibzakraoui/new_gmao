<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFactoryRequest;
use Illuminate\Http\Request;
use App\Models\Factory;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\View;
use App\Exceptions\PermissionDeniedException;
use Illuminate\Support\Str;


class FactoryController extends Controller
{
    private $module = "factories";
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
        return view('pages.factories.index');
    }

    public function list(Request $request){

        /* User does not have permission */
        if(!auth()->user()->can("view {$this->module}")){
            throw new PermissionDeniedException($request);
        }

        return DataTables::eloquent(Factory::query())
        ->addColumn('actions', function ($factory) {
            return View::make("pages.{$this->module}.datatables.actions")->with('factory', $factory)->render();;
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
        return view("pages.{$this->module}.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateFactoryRequest $request)
    {
        if(!auth()->user()->can("create {$this->module}")){
            throw new PermissionDeniedException($request);
        }
        $request->validated();
        if(Factory::create([
            'uuid' => Str::uuid(),
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            'description' => $request->get('description'),
            'active' => $request->get('active') ?? false,
        ]))
        {
            return redirect($this->module)->with('success', 'Factory added successfully!');
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
    public function edit(Request $request ,Factory $factory)
    {
        if(!auth()->user()->can("edit {$this->module}")){
            throw new PermissionDeniedException($request);
        }
        return view("pages.{$this->module}.edit")->with(Str::singular($this->module), $factory->firstOrFail());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFactoryRequest $request, Factory $factory)
    {
        /* User does not have permission */
        if(!auth()->user()->can("edit {$this->module}")){
            throw new PermissionDeniedException($request);
        }else{
            /* User does have permission */
            $request->validated();
            if($factory->firstOrFail()->update($request->all()))
            {
                return redirect($this->module)->with('success', 'Factory edited successfully!');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Factory $factory)
    {
        if(!auth()->user()->can("delete {$this->module}")){
            throw new PermissionDeniedException($request);
        }else{
            if($factory->firstOrFail()->delete()){
                return redirect($this->module)->with('deleted', true)->with('success', 'Factory deleted successfully!');
            }
        }

    }
}
