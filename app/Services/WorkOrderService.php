<?php


namespace App\Services;


use App\Models\Gamut;
use App\Models\WorkOrder;
use Carbon\Carbon;
use Illuminate\Support\Str;

class WorkOrderService
{
    public static function generateFromGamut(Gamut $gamut, Carbon $deadline, Carbon $next_run, $periodicity)
    {
        $workOrder = new WorkOrder();
        $workOrder->uuid = (string) Str::uuid();
        $workOrder->designation = $gamut->designation;
        $workOrder->equipment_id = $gamut->equipment_id;
        $workOrder->part_id = $gamut->part_id;
        $workOrder->gamut_id = $gamut->id;
        $workOrder->service_id = $gamut->service_id;
        $workOrder->type = 'gamut';
        $workOrder->expected_duration_in_hours = $gamut->estimated_hours;
        $workOrder->objective_completion_date = $deadline->addHours(8)->addHours($gamut->estimated_hours);
        $workOrder->expected_completion_date = $next_run;
        $workOrder->status_code = '64-RDY';
        $workOrder->status = 'pending';
        $workOrder->save();

        if($periodicity === "Daily"){
            $gamut->next_run = $next_run;
        }elseif ($periodicity === "Weekly"){
            $gamut->next_run = $next_run->addWeek();
        }elseif ($periodicity === "Bimensual"){
            $gamut->next_run = $next_run;
        }
        $gamut->save();
    }
}
