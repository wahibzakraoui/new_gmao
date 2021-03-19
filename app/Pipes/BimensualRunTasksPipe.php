<?php


namespace App\Pipes;
use App\Models\WorkOrder;
use App\Services\WorkOrderService;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Closure;
use Illuminate\Support\Str;


class BimensualRunTasksPipe
{
    public static string $period = "Bimensual";

    public function handle($gamut, Closure $next)
    {
        if($gamut->periodicity->name === self::$period)
        {
            $run_day = $gamut->run_day ?? "monday";
            $currentMonth = Carbon::now()->format('F');

            $runDays = [
                'first_runday' => new Carbon('first '.$run_day.' of '.$currentMonth),
                'second_runday' => new Carbon('third '.$run_day.' of '.$currentMonth)
            ];

            foreach ($runDays as $day){
                WorkOrderService::generateFromGamut($gamut, $day, new Carbon('first '.$run_day.' of next month'), self::$period);
            }
        }
        return  $next($gamut);
    }
}
