<?php

namespace App\Console\Commands;

use App\Models\Equipment;
use App\Models\Factory;
use App\Models\Gamut;
use App\Models\GamutDraft;
use App\Models\Part;
use App\Models\Periodicity;
use App\Models\Service;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Carbon\CarbonImmutable;

class initGamuts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:gamuts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        GamutDraft::all()->map(function(GamutDraft $draft){

            $equipment = Equipment::whereCode($draft->equipment_code)->first();
            $part = Part::whereCode($draft->equipment_code)->first();
            $periodicity = Periodicity::whereCode($draft->periodicity)->first();
            $service = Service::whereName($draft->type)->first();

            $now = CarbonImmutable::now()->locale('en_US');

            if($draft->type == "Oil" || $draft->type == "Grease"){
                $type = "lubrification";
            }else{
                $type = "visit";
            }

            if($draft->periodicity == "Daily" || $draft->periodicity == "Weekly")
            {
                $next_run = $now->startOfWeek(Carbon::FRIDAY)->format('Y-m-d H:i:s');
            }
            elseif($draft->periodicity == "Monthly")
            {
                $next_run = $now->startOfMonth($now)->format('Y-m-d H:i:s');
            }
            elseif($draft->periodicity == "Quarterly")
            {
                $next_run = $now->startOfQuarter($now)->format('Y-m-d H:i:s');
            }
            elseif($draft->periodicity == "Semestrial")
            {
                $next_run = $now->startOfQuarter($now)->subDays(90)->format('Y-m-d H:i:s');
            }
            elseif($draft->periodicity == "Yearly")
            {
                $next_run = $now->startOfYear($now)->format('Y-m-d H:i:s');
            }else{
                $next_run = $now->startOfYear($now)->subYear(1)->format('Y-m-d H:i:s');
            }


            Gamut::create([
                'uuid' => Str::uuid(),
                'designation' => $draft->equipment,
                'code' => $draft->gamut_code,
                'factory_id' => Factory::whereCode($draft->factory_code)->first()->id,
                'equipment_id' => $equipment->id ?? null,
                'part_id' => $part->id ?? null,
                'area_id' => $equipment->area_id ?? null,
                'type' => $type ?? null,
                'periodicity_id' => $periodicity->id ?? null,
                'state' => $draft->state == "Running" ? "Running" : "Offline",
                'next_run' => $next_run,
                'service_id' => $service->id,
                'estimated_hours' => $draft->estimated_hours > 0 ? $draft->estimated_hours : 8,
                'assigned_user_id' => $draft->assigned_user_id ?? null,
            ]);
        });
    }
}
