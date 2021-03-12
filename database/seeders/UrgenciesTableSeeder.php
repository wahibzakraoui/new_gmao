<?php

namespace Database\Seeders;

use App\Models\Urgency;
use Illuminate\Database\Seeder;

class UrgenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $urgencies = [
            ['localized_name_key' => 'to_do_during_the_day', 'value_in_days' => 1],
            ['localized_name_key' => 'to_do_during_the_week', 'value_in_days' => 7],
            ['localized_name_key' => 'to_do_during_the_fortnight', 'value_in_days' => 15],
            ['localized_name_key' => 'to_do_during_the_month', 'value_in_days' => 30],
            ['localized_name_key' => 'to_do_during_the_quarter', 'value_in_days' => 90],
            ['localized_name_key' => 'to_do_during_the_semester', 'value_in_days' => 180],
            ['localized_name_key' => 'to_do_during_the_year', 'value_in_days' => 365],
        ];

        collect($urgencies)->map(function($urgency){
            Urgency::create($urgency);
        });
    }
}
