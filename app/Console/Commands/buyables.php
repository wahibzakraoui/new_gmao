<?php

namespace App\Console\Commands;

use App\Models\Buyable;
use App\Models\Equipment;
use App\Models\Part;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class buyables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'buyables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fills the buyables table.';

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
        // Get all Equipment
        Equipment::all()->map(static function(Equipment $equipment){
            Buyable::updateOrCreate(['uuid' => $equipment->uuid],[
                'uuid' => $equipment->uuid,
                'name' => $equipment->name,
                'code' => $equipment->code,
                'modelType' => get_class($equipment),
                'modelId' => $equipment->id,
                'area_id' => $equipment->area_id,
            ]);
        });
        // Get all Parts
        Part::all()->map(static function(Part $part){
            Buyable::updateOrCreate(['uuid' => $part->uuid],[
                'uuid' => $part->uuid,
                'name' => $part->name,
                'code' => $part->code,
                'modelType' => get_class($part),
                'modelId' => $part->id,
                'area_id' => $part->area_id
            ]);
        });
    }
}
