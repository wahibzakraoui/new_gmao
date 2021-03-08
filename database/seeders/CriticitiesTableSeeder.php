<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Trexology\Inventory\Models\InventoryMetric as Metric;


class CriticitiesTableSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'criticities';
        $this->filename = base_path().'/database/csv/criticities.csv';
        $this->should_trim = true;
    }

    public function run()
    {
        // Recommended when importing larger CSVs
        DB::disableQueryLog();

        // Uncomment the below to wipe the table clean before populating
        //DB::table($this->table)->truncate();

        parent::run();
    }
}
