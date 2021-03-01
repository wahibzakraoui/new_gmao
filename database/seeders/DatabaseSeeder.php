<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Employee;
use App\Models\Species;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        $this->call(RoleTableSeeder::class);
        $this->call(MetricsTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
    }
}
