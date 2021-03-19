<?php


namespace App\Pipes;


use App\Models\WorkOrder;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Closure;
class BiannualRunTasksPipe
{
    public static string $period = "Biannual";

    public function handle($gamut, Closure $next)
    {
        $gamutMonthName = Carbon::parse($gamut->next_run)->format('F');

        if($gamut->periodicity->name === self::$period)
        {
            $run_day = $gamut->run_day ?? "monday";
            $next_run_day = Carbon::parse("first ".$run_day.' of '.$gamutMonthName);
            $workOrder = new WorkOrder();
            $workOrder->uuid = (string) Str::uuid();
            $workOrder->designation = $gamut->designation;
            $workOrder->equipment_id = $gamut->equipment_id;
            $workOrder->part_id = $gamut->part_id;
            $workOrder->gamut_id = $gamut->id;
            $workOrder->service_id = $gamut->service_id;
            $workOrder->type = 'gamut';
            $workOrder->expected_duration_in_hours = $gamut->estimated_hours;
            $workOrder->status_code = '64-RDY';
            $workOrder->objective_completion_date = $next_run_day->addHours(8)->addHours($gamut->estimated_hours);
            $workOrder->expected_completion_date = $next_run_day->addHours(8)->addHours($gamut->estimated_hours);
            $workOrder->status = 'pending';
            $workOrder->save();

            $gamut->next_run = $next_run_day->addYears(2);
            $gamut->save();
        }
        return  $next($gamut);
    }
}
