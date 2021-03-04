<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service; 

use Trexology\Inventory\Models\InventoryMetric as Metric;


class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            ['name' => 'Mechanical'],
            ['name' => 'Electrical'],
            ['name' => 'Instrumentation'],
            ['name' => 'Grease'],
            ['name' => 'Oil'],
        ];

        collect($services)->each(function($service){
            Service::create($service);
        });
    }
}
