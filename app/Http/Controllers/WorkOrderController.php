<?php

namespace App\Http\Controllers;

use App\Exceptions\PermissionDeniedException;
use App\Http\Requests\CreateWorkOrderRequest;
use App\Http\Requests\ExecuteWorkOrderRequest;
use App\Http\Requests\UpdateWorkOrderRequest;
use App\Models\Equipment;
use App\Models\Part;
use App\Models\Service;
use App\Models\Urgency;
use App\Models\User;
use App\Models\WorkOrder;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Spatie\ModelStates\Exceptions\CouldNotPerformTransition;
use Yajra\DataTables\Facades\DataTables;

class WorkOrderController extends Controller
{
    private string $module = "work_orders";

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     * @throws PermissionDeniedException
     */
    public function index(Request $request): Response
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
     * @return Response
     * @throws PermissionDeniedException
     */
    public function finished(Request $request): Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'view', $this->module);

        return response(
            view("pages.{$this->module}.finished")
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws PermissionDeniedException
     */
    public function list(Request $request): JsonResponse
    {

        /* check if User does not have permission */
        $this->checkPerms($request, 'view', $this->module);

        try {

            $query = WorkOrder::
            with('gamut')
                ->with('equipment')
                ->withCasts(['status_code' => 'string']);
            /* If Not Admin, restrict to own created WOs or assigned WOs */
            $query->where('status', '!=', 'finished');
            $query->orderBy('id', 'desc');

            if (!$request->user()->hasPermissionTo('assign work_orders')) {
                $query->where('work_orders.assigned_user_id', '=', $request->user()->id)
                    ->orWhere('work_orders.requested_by', '=', $request->user()->id);
            }

            return DataTables::of($query)->addColumn('actions', function ($workOrder) {
                return View::make("pages.{$this->module}.datatables.actions")->with('workOrder', $workOrder)->render();
            })
                ->rawColumns(['actions'])->make(true);

        } catch (Exception $e) {

        }
        return response()->json([]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws PermissionDeniedException
     */
    public function finished_list(Request $request): JsonResponse
    {

        /* check if User does not have permission */
        $this->checkPerms($request, 'view', $this->module);

        try {

            $query = WorkOrder::getDatatable();
            /* If Not Admin, restrict to own created WOs or assigned WOs */
            $query->where('status', '=', 'finished');
            if (!$request->user()->hasPermissionTo('assign work_orders')) {
                $query->where('work_orders.assigned_user_id', '=', $request->user()->id)
                    ->orWhere('work_orders.requested_by', '=', $request->user()->id);
            }

            return DataTables::of($query)->addColumn('actions', function ($workOrder) {
                return View::make("pages.{$this->module}.datatables.actions")->with('workOrder', $workOrder)->render();
            })
                ->rawColumns(['actions'])->make(true);

        } catch (Exception $e) {

        }
        return response()->json([]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param WorkOrder|null $workOrder
     * @return Response
     * @throws PermissionDeniedException
     */
    public function create(Request $request, WorkOrder $workOrder = null): Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'create', $this->module);

        return response(
            view("pages.{$this->module}.add")
                ->with('equipmentList', Equipment::getList())
                ->with('partsList', Part::getList())
                ->with('urgenciesList', Urgency::getList())
                ->with('parentWO', $workOrder)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateWorkOrderRequest $request
     * @return RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     */
    public function store(CreateWorkOrderRequest $request)
    {
        /* User does not have permission */
        $this->checkPerms($request, 'create', $this->module);

        /* User does have permission */
        $request->validated();

        $parentGamutID = null;
        $parentequipmentID = null;
        $parentPartID = null;

        if ($request->filled('parent_id')) {
            $parent = WorkOrder::whereId($request->get('parent_id'))->get()->first();
            $parentGamutID = $parent->gamut_id;
            $parentequipmentID = $parent->equipment_id;
            $parentPartID = $parent->part_id;
        }

        $workOrder = WorkOrder::create(
            [
                'uuid' => Str::uuid(),
                'designation' => $request->get('designation'),
                'description' => $request->get('description'),
                'equipment_id' => $request->get('equipment_id') ?: $parentequipmentID,
                'part_id' => $request->get('part_id') ?: $parentPartID,
                'parent_id' => $request->filled('parent_id') ? $request->get('parent_id') : null,
                'requested_by' => $request->user()->id,
                'type' => $request->filled('parent_id') ? 'complementary_wo' : 'corrective_maintenance',
                'gamut_id' => $request->filled('parent_id') ? $parentGamutID : null,
                'status' => 'pending',
            ]
        );

        if ($workOrder) {
            if (isset($parent)) {
                $parent->status = 'finished';
                $parent->save();
            }
            if ($request->hasFile('photo')) {
                try {
                    $workOrder->addMedia($request->file('photo'))->toMediaCollection('work_orders');
                } catch (Exception $e) {
                    /* don't do anything ? */
                }
            }
            return redirect($this->module)->with('success', 'WO created successfully!');
        }
        return redirect($this->module);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param WorkOrder $workOrder
     * @return Response
     * @throws PermissionDeniedException
     */
    public function edit(Request $request, WorkOrder $workOrder): Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'assign', $this->module);

        return response(
            view("pages.{$this->module}.edit")
                ->with(Str::singular($this->module), $workOrder)
                ->with('equipmentList', Equipment::getList())
                ->with('servicesList', Service::all()->pluck('name', 'id')->prepend(''))
                ->with('usersList', User::all()->pluck('name', 'id')->prepend(''))
                ->with('partsList', Part::getList())
        );
    }

    /**
     * Finish WO.
     *
     * @param Request $request
     * @param WorkOrder $workOrder
     * @return Application|RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     */
    public function execute(Request $request, WorkOrder $workOrder)
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'execute', $this->module);

        return response(
            view("pages.{$this->module}.execute")
                ->with(Str::singular($this->module), $workOrder)
                ->with('equipmentList', Equipment::getList())
                ->with('servicesList', Service::all()->pluck('name', 'id')->prepend(''))
                ->with('usersList', User::all()->pluck('name', 'id')->prepend(''))
                ->with('partsList', Part::getList())
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateWorkOrderRequest $request
     * @param WorkOrder $workOrder
     * @return Application|RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     * @throws CouldNotPerformTransition
     */
    public function update(UpdateWorkOrderRequest $request, WorkOrder $workOrder)
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'edit', $this->module);

        /* User does have permission */
        $request->validated();
        if ($workOrder->update(
            [
                'designation' => $request->get('designation'),
                'description' => $request->get('description'),
                'objective_completion_date' => $request->get('objective_completion_date'),
                'service_id' => $request->get('service_id'),
                'assigned_user_id' => $request->get('assigned_user_id'),
                'approved_by' => $request->user()->id,
                'status' => $request->filled('assigned_user_id') ? 'assigned' : 'pending',
            ]
        )) {
            if ($request->filled('status_code')) $workOrder->status_code->transitionTo($request->get('status_code'));
            return redirect($this->module)->with('success', 'Work Order edited successfully!');
        }
        return redirect($this->module);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ExecuteWorkOrderRequest $request
     * @param WorkOrder $workOrder
     * @return Application|RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     * @throws CouldNotPerformTransition
     */
    public function store_execution(ExecuteWorkOrderRequest $request, WorkOrder $workOrder)
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'edit', $this->module);

        /* User does have permission */
        $request->validated();
        if ($workOrder->update(
            [
                'real_completion_date' => $request->get('real_completion_date'),
                'feedback' => $request->get('feedback'),
                'done' => $request->get('done'),
                'status' => 'finished',
            ]
        )) {
            $workOrder->status_code->transitionTo('80-COM');
            return redirect($this->module)->with('success', 'Work Order completed successfully!');
        }
        return redirect($this->module);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param WorkOrder $workOrder
     * @return Application|RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     */
    public function destroy(Request $request, WorkOrder $workOrder)
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'delete', $this->module);

        if ($workOrder->delete()) {
            return redirect($this->module)->with('deleted', true)->with('success', 'WO deleted successfully!');
        }

        return redirect($this->module);
    }
}
