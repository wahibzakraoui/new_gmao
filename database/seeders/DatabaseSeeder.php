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
        //User::factory(1)->create();
        $this->call(ServicesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(MetricsTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(FactoriesTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(AreaCodesTableSeeder::class);
        $this->call(EquipmentsTableSeeder::class);
        $this->call(PeriodicitiesTableSeeder::class);
        $this->call(PartsTableSeeder::class);
        $this->call(GamutDraftsTableSeeder::class);
        $this->call(CriticitiesTableSeeder::class);
        $this->call(UrgenciesTableSeeder::class);
        $this->call(SuppliersSeeder::class);


        // Other migrations should be added above this line
        $this->call(FirstTimeSetup::class);
    }
}
