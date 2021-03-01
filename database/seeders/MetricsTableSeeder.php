<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Trexology\Inventory\Models\InventoryMetric as Metric;


class MetricsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $metrics = [
            ['name' => 'Kilogram', 'symbol' => 'Kg'],
            ['name' => 'Piece', 'symbol' => 'Pi'],
            ['name' => 'Liter', 'symbol' => 'L'],
        ];

        collect($metrics)->each(function($metric){
            Metric::create($metric);
        });
    }
}
