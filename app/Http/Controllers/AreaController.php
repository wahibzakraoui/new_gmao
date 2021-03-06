<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAreaRequest;
use App\Http\Requests\CreateAreaRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Factory;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Redirector;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\View;
use App\Exceptions\PermissionDeniedException;
use App\Models\Area;
use App\Models\AreaCode;
use Illuminate\Support\Str;


class AreaController extends Controller
{
    private $module = "areas";

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
        if(!auth()->user()->can("view {$this->module}")) {
            throw new PermissionDeniedException($request);
        }
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
     * @throws Exception
     */
    public function list(Request $request): JsonResponse
    {
        /* User does not have permission */
        if(!auth()->user()->can("view {$this->module}")){
            throw new PermissionDeniedException($request);
        }

        return DataTables::of(Area::leftJoin('factories', 'areas.factory_id', '=', 'factories.id')
        ->select([
            'areas.id',
            'areas.name',
            'areas.description',
            'factories.name as factoryName',
            'areas.active',
        ]))
        ->orderColumn('areas.id', function ($query, $order) {
            $query->orderBy('id', $order);
        })
        ->addColumn('areaCodes', function ($area) {
                return View::make("pages.{$this->module}.datatables.areacodes")->with('area', $area)->render();
        })
        ->addColumn('actions', function ($area) {
                return View::make("pages.{$this->module}.datatables.actions")->with('area', $area)->render();
        })
        ->rawColumns(['actions', 'areaCodes'])
        ->make(true);
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
        return response(
            view("pages.{$this->module}.add")
                ->with('factoriesList', Factory::All()
                ->pluck('name', 'id'))
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateAreaRequest $request
     * @return RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     */
    public function store(CreateAreaRequest $request)
    {
        if(!auth()->user()->can("create {$this->module}")){
            throw new PermissionDeniedException($request);
        }

        $request->validated();
        $area = Area::create([
            'uuid' => Str::uuid(),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'factory_id' => $request->get('factory_id'),
            'active' => $request->get('active') ?? false,
        ]);

        if($area)
        {
            collect($request->get('codes'))->each(function($code) use ($area){
                $id = $area->id;
                $code = ['area_id' => $id ,'code' => $code];
                AreaCode::create($code);
            });
            return redirect($this->module)->with('success', __('area.area_added_success'));
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
     */
    public function show(Request $request, int $id): Response
    {
        if(!auth()->user()->can("view {$this->module}")){
            throw new PermissionDeniedException($request);
        }
        // To do - return view
        return response($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Area $area
     * @return \Illuminate\Contracts\View\View|Response
     * @throws PermissionDeniedException
     */
    public function edit(Request $request , Area $area)
    {
        if(!auth()->user()->can("edit {$this->module}")){
            throw new PermissionDeniedException($request);
        }
        return view("pages.{$this->module}.edit")
        ->with(Str::singular($this->module), $area)
        ->with('factoriesList', Factory::All()->pluck('name', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAreaRequest $request
     * @param Area $area
     * @return RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     */
    public function update(UpdateAreaRequest $request, Area $area)
    {
        /* User does not have permission */
        if(!auth()->user()->can("edit {$this->module}")){
            throw new PermissionDeniedException($request);
        }else{
            /* User does have permission */
            $request->validated();
            if($area->update($request->only(['name', 'description', 'active', 'factory_id'])))
            {
                $area->codes()->delete();
                collect($request->get('codes'))->each(function($code) use ($area){
                    $id = $area->id;
                    $code = ['area_id' => $id ,'code' => $code];
                    AreaCode::create($code);
                });
                return redirect($this->module)->with('success', __('area.area_edited_success'));
            }
        }
        return redirect($this->module);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Area $area
     * @return RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     * @throws Exception
     */
    public function destroy(Request $request, Area $area)
    {
        if(!auth()->user()->can("delete {$this->module}")){
            throw new PermissionDeniedException($request);
        }else{
            if($area->codes()->delete() && $area->delete()){
                return redirect($this->module)->with('deleted', true)->with('success', __('area.area_deleted_success'));
            }
        }
        return redirect($this->module);
    }

    /**
     * Get specified area codes in JSON.
     *
     * @param Area $area
     * @return JsonResponse
     */
    public function getAreaCodesJSON(Area $area): JsonResponse
    {
        $result = $area->codes->map(function($code){
            return [
                'name' => $code->code,
                'id' => $code->code,
            ];
        });
        if(!empty($result)) return response()->json($result);
        return response()->json([]);
    }

}
