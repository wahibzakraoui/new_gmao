<?php
namespace Database\Seeders;
use Flynsarmy\CsvSeeder\CsvSeeder;

use Illuminate\Support\Facades\DB;

class AreaCodesTableSeeder extends CsvSeeder {

	public function __construct()
	{
		$this->table = 'area_codes';
		$this->filename = base_path().'/database/csv/area_codes.csv';
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