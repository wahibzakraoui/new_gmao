<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Gamut;
use App\Models\WorkOrder;
use Carbon\Carbon;
use Illuminate\Support\Str;

class DoWork extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DoWork';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates Work Orders based on Gamuts';

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
    public function handle(): int
    {
        $today = Carbon::now()->timezone('Africa/Casablanca')->startOfDay();
        $gamuts = Gamut::whereNextRun(null)->whereActive(1)
        ->orWhere('next_run', '<=', $today->startOfDay()->format('Y-m-d H:i:s'))->get();

        $gamuts->map(function($gamut){

            $today = Carbon::now()->timezone('Africa/Casablanca')->startOfDay();

            $workOrder = new WorkOrder();
            $workOrder->uuid = (string) Str::uuid();
            $workOrder->designation = $gamut->designation;
            $workOrder->equipment_id = $gamut->equipment_id;
            $workOrder->part_id = $gamut->part_id;
            $workOrder->gamut_id = $gamut->id;
            $workOrder->service_id = $gamut->service_id;
            $workOrder->type = 'gamut';
            $workOrder->deadline = $today->addHours(8)->addHours($gamut->estimated_hours);
            $workOrder->status = 'pending';
            $workOrder->save();
            $gamut->next_run = $today->add($gamut->periodicity->frequency, $gamut->periodicity->unit);
            $gamut->increment('runs');
            $gamut->save();

        });
        return 0;
    }
}
