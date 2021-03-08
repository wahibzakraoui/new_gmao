<?php

namespace App\Http\Controllers;

use App\Exceptions\PermissionDeniedException;
use App\Models\Equipment;
use App\Models\WorkOrder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
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
            return DataTables::of(WorkOrder::
                leftJoin('equipment', 'equipment.id', '=', 'work_orders.equipment_id')
                ->leftJoin('gamuts', 'gamuts.id', '=', 'work_orders.gamut_id')
                ->leftJoin('services', 'services.id', '=', 'work_orders.service_id')
                ->leftJoin('users', 'users.id', '=', 'work_orders.assigned_user_id')
                ->select([
                    'work_orders.id',
                    'work_orders.designation',
                    'work_orders.id as number',
                    'equipment.name as equipmentName',
                    'gamuts.code as gamutCode',
                    'users.name as userName',
                    'work_orders.type',
                    'work_orders.status',
                ]))
                ->addColumn('actions', function ($equipment) {
                    return '';
                })
                ->rawColumns(['actions'])
                ->make(true);
        } catch (\Exception $e) {

        }
        return response()->json([]);
    }
}
