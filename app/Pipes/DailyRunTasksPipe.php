<?php


namespace App\Pipes;
use App\Models\WorkOrder;
use App\Services\WorkOrderService;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Closure;
use Illuminate\Support\Str;


class DailyRunTasksPipe
{
    public static string $period = "Daily";

    public function handle($gamut, Closure $next)
    {
        if($gamut->periodicity->name === self::$period)
        {
            $next_monday = Carbon::parse("next monday");
            $next_friday = Carbon::parse("next friday");
            $period = CarbonPeriod::create($next_monday, $next_friday);

            collect($period)->each(static function($day) use($gamut, $next_friday)
            {
                $deadline = $day;
                WorkOrderService::generateFromGamut($gamut, $deadline, $next_friday, self::$period);
            });
        }
        return  $next($gamut);
    }
}
