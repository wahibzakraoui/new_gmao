<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    public function pdf(Request $request, WorkOrder $workOrder)
    {
        return 'hi';
    }
}
