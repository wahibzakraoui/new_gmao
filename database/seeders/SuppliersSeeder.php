<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suppliers = [
            [
                'name' => 'Techify',
                'address' => 'Km03, route al marsa',
                'city' => 'LAAYOUNE',
                'country' => 'MOROCCO',
                'contact_phone' => '+212528000000',
            ],
        ];
        collect($suppliers)->map(function($s){
            Supplier::create($s);
        });
    }
}
