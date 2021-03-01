<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Trexology\Inventory\Models\Location;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            ['name' => 'Magasin 01'],
            ['name' => 'Magasin 02'],
        ];
        
        collect($locations)->each(function($location){
            Location::create($location);
        });
    }
}
