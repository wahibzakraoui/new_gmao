<?php

namespace App\Console\Commands;

use App\Models\Gamut;
use App\Pipes\BiannualRunTasksPipe;
use App\Pipes\BimensualRunTasksPipe;
use App\Pipes\DailyRunTasksPipe;
use App\Pipes\MonthlyRunTasksPipe;
use App\Pipes\QuarterlyRunTasksPipe;
use App\Pipes\SemestrialRunTasksPipe;
use App\Pipes\WeeklyRunTasksPipe;
use App\Pipes\YearlyRunTasksPipe;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Pipeline\Pipeline;

class Maintenance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maintenance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates work orders for next week. Monday to Friday. Runs on Fridays.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::now()->timezone('Africa/Casablanca')->startOfDay();
        $gamuts = Gamut::whereNextRun(null)->whereActive(1)
            ->orWhere('next_run', '<=', $today->startOfDay()->format('Y-m-d H:i:s'))->get();

        $pipes = [
            DailyRunTasksPipe::class,
            WeeklyRunTasksPipe::class,
            BimensualRunTasksPipe::class,
            MonthlyRunTasksPipe::class,
            QuarterlyRunTasksPipe::class,
            SemestrialRunTasksPipe::class,
            YearlyRunTasksPipe::class,
            BiannualRunTasksPipe::class
        ];

        $gamuts->each(function ($gamut) use($pipes){
            $post = app(Pipeline::class)
                ->send($gamut)
                ->through($pipes)
                ->then(static function ($content) {

                });
        });

    }
}
