<?php


namespace App\Http\Controllers;

use App\Actions\Kerp\CreateNewArea;
use App\Actions\Kerp\UpdateArea;
use App\Exceptions\PermissionDeniedException;
use App\Http\Requests\CreateAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Models\Area;
use App\Models\Factory;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;


class AreaController extends Controller
{
    protected string $module = "areas";

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     * @throws PermissionDeniedException
     */
    public function index(Request $request): Response
    {
        /* check if User does not have permission - @throws PermissionDeniedException */
        $this->checkPerms($request, 'view', $this->module);
        /* return response */
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
        /* check if User does not have permission - @throws PermissionDeniedException */
        $this->checkPerms($request, 'view', $this->module);

        return DataTables::eloquent(Area::with('factory'))
            ->addColumn('areaCodes', function ($area) {
                return View::make("pages.{$this->module}.datatables.areacodes")->with('area', $area)->render();
            })
            ->addColumn('actions', function ($area) {
                return View::make("pages.{$this->module}.datatables.actions")->with('area', $area)->render();
            })
            ->rawColumns(['actions', 'areaCodes'])
            ->toJson();

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
        /* check if User does not have permission */
        $this->checkPerms($request, 'create', $this->module);
        if (CreateNewArea::create($request)) {
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
     * @todo Return a working view
     */
    public function show(Request $request, int $id): Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'view', $this->module);

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
    public function edit(Request $request, Area $area)
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'edit', $this->module);

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
        /* check if User does not have permission */
        $this->checkPerms($request, 'edit', $this->module);

        /* User does have permission */
        if (UpdateArea::update($request, $area)) {
            return redirect($this->module)->with('success', __('area.area_edited_success'));
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
        /* check if User does not have permission */
        $this->checkPerms($request, 'delete', $this->module);

        if ($area->delete() && $area->codes()->delete()) {
            return redirect($this->module)->with('deleted', true)->with('success', __('area.area_deleted_success'));
        }
        return redirect($this->module);
    }

    /**
     * Get specified area codes in JSON.
     *
     * @param Request $request
     * @param Area $area
     * @return JsonResponse
     * @throws PermissionDeniedException
     */
    public function getAreaCodesJSON(Request $request, Area $area): JsonResponse
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'view', $this->module);

        $result = $area->codes->map(function ($code) {
            return [
                'name' => $code->code,
                'id' => $code->code,
            ];
        });
        if (!empty($result)) {
            return response()->json($result);
        }
        return response()->json([]);
    }

}
