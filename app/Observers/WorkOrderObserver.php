<?php

namespace App\Observers;

use App\Events\workOrderCreated;
use App\Models\WorkOrder;
use Illuminate\Support\Facades\Log;

class WorkOrderObserver{

    public function created(WorkOrder $workOrder): void
    {
        event(workOrderCreated::class, $workOrder);
    }
}
