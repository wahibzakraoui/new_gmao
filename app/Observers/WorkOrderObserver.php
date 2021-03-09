<?php

namespace App\Observers;

use App\Models\WorkOrder;
use Illuminate\Support\Facades\Log;

class WorkOrderObserver{

    public function created(WorkOrder $workOrder)
    {
        event()
    }
}
