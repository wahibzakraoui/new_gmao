<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFactoryRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Factory;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
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
     * @param Request $request
     * @return \Illuminate\Contracts\View\View|Response
     * @throws PermissionDeniedException
     */
    public function index(Request $request) : Response
    {
        /* User does not have permission */
        if(!auth()->user()->can("view {$this->module}")){
            throw new PermissionDeniedException($request);
        }
        return response()->view("pages.{$this->module}.index");
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws PermissionDeniedException
     */
    public function list(Request $request): JsonResponse
    {

        /* User does not have permission */
        if(!auth()->user()->can("view {$this->module}")){
            throw new PermissionDeniedException($request);
        }

        try {
            return DataTables::eloquent(Factory::query())
                ->addColumn('actions', function ($factory) {
                    return View::make("pages.{$this->module}.datatables.actions")->with('factory', $factory)->render();
                })
                ->rawColumns(['actions'])
                ->make(true);
        } catch (Exception $e) {
        }
        return response()->json([]);
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
        /* User does not have permission */
        if(!auth()->user()->can("create {$this->module}")){
            throw new PermissionDeniedException($request);
        }
        return response()->view("pages.{$this->module}.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateFactoryRequest $request
     * @return RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
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
        return redirect($this->module);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return Response
     * @throws PermissionDeniedException
     */
    public function show(Request $request): Response
    {
        if(!auth()->user()->can("view {$this->module}")){
            throw new PermissionDeniedException($request);
        }
        return response()->view('dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Factory $factory
     * @return Response
     * @throws PermissionDeniedException
     */
    public function edit(Request $request ,Factory $factory): Response
    {
        if(!auth()->user()->can("edit {$this->module}")){
            throw new PermissionDeniedException($request);
        }
        return response(
            view("pages.{$this->module}.edit")->with(Str::singular($this->module), $factory->firstOrFail())
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFactoryRequest $request
     * @param Factory $factory
     * @return RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
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
        return redirect($this->module);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Factory $factory
     * @return RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     * @throws Exception
     */
    public function destroy(Request $request, Factory $factory): RedirectResponse
    {
        if(!auth()->user()->can("delete {$this->module}")){
            throw new PermissionDeniedException($request);
        }else{
            if($factory->firstOrFail()->delete()){
                return redirect($this->module)->with('deleted', true)->with('success', 'Factory deleted successfully!');
            }
        }
        return redirect($this->module);
    }
}
