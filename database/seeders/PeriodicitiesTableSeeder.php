<?php
namespace Database\Seeders;
use Flynsarmy\CsvSeeder\CsvSeeder;

use Illuminate\Support\Facades\DB;

class PeriodicitiesTableSeeder extends CsvSeeder {

	public function __construct()
	{
		$this->table = 'periodicities';
		$this->filename = base_path().'/database/csv/periodicities.csv';
		$this->should_trim = true;
	}

	public function run()
	{
		// Recommended when importing larger CSVs
		DB::disableQueryLog();

		// Uncomment the below to wipe the table clean before populating
		// DB::table($this->table)->truncate();
		parent::run();
	}
}