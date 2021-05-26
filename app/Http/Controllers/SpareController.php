<?php

namespace App\Http\Controllers;

use App\Exceptions\PermissionDeniedException;
use App\Http\Requests\CreateSpareRequest;
use App\Http\Requests\UpdatePartRequest;
use App\Models\Area;
use App\Models\Criticity;
use App\Models\Equipment;
use App\Models\Part;
use App\Models\Spare;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Yajra\DataTables\Facades\DataTables;

class SpareController extends Controller
{
    private string $module = "spares";

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
            return DataTables::of(Spare::query())
                ->addColumn('actions', function ($spare) {
                    return View::make("pages.{$this->module}.datatables.actions")->with('spare', $spare)->render();
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
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateSpareRequest $request
     * @return Application|RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     */
    public function store(CreateSpareRequest $request)
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'create', $this->module);

        $request->validated();
        $spare = Spare::create([
            'uuid' => Str::uuid(),
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            'complementary_code' => $request->get('complementary_code'),
            'stock' => $request->get('stock'),
            'active' => $request->get('active') ?? false
        ]);

        if($spare)
        {
            return redirect($this->module)->with('success', __('parts.part_added_success'));
        }
        return redirect($this->module);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Spare $spare
     * @return Response
     * @throws PermissionDeniedException
     */
    public function edit(Request $request , Spare $spare): Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'edit', $this->module);

        return response(
            view("pages.{$this->module}.edit")
                ->with(Str::singular($this->module), $spare)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateSpareRequest $request
     * @param Spare $spare
     * @return Application|RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     */
    public function update(CreateSpareRequest $request, Spare $spare)
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'edit', $this->module);

        /* User does have permission */
        $request->validated();
        if($spare->update($request->only(['name', 'code', 'complementary_code', 'stock'])))
        {
            return redirect($this->module.'/edit/'.$spare->id)->with('success', __('parts.part_edited_success'));
        }
        return redirect($this->module);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param SPare $spare
     * @return Application|RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     * @throws Exception
     */
    public function destroy(Request $request, Spare $spare)
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'delete', $this->module);

        if($spare->delete()){
            return redirect($this->module)->with('deleted', true)->with('success', 'Spare deleted successfully!');
        }

        return redirect($this->module);
    }


}
