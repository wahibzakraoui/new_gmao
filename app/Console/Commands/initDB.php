<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Part;
use App\Models\AreaCode;
use App\Models\Equipment;

class initDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:parts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates area_id, equipment_id fields in parts table';

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
        Part::all()->map(function(Part $part){

            $area_id = AreaCode::whereCode($part->area_code)->first();
            $equipment_id = Equipment::whereCode($part->equipment_code)->first();

            if($area_id){
                $part->area_id = $area_id->area_id;
            }


            if($equipment_id){
                $part->equipment_id = $equipment_id->id;
            }

            $part->save();
        });
    }
}
