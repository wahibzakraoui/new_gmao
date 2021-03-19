<?php /** @noinspection DuplicatedCode */


namespace App\Pipes;
use App\Models\WorkOrder;
use App\Services\WorkOrderService;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Closure;
use Illuminate\Support\Str;


class WeeklyRunTasksPipe
{
    public static string $period = "Weekly";

    public function handle($gamut, Closure $next)
    {
        if($gamut->periodicity->name === self::$period)
        {
            $run_day = $gamut->run_day ?? "monday";
            $workday = Carbon::parse("next ".$run_day);
            $deadline = Carbon::parse("next friday");

            WorkOrderService::generateFromGamut($gamut, $workday, $deadline, self::$period);

        }
        return  $next($gamut);
    }

}
