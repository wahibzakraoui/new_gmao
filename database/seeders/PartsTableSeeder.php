<?php
namespace Database\Seeders;
use Flynsarmy\CsvSeeder\CsvSeeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

class PartsTableSeeder extends CsvSeeder {

	public function __construct()
	{
		$this->table = 'parts';
		$this->filename = base_path().'/database/csv/parts.csv';
		$this->should_trim = true;
	}

	public function run()
	{
		// Recommended when importing larger CSVs
		DB::disableQueryLog();

		// Uncomment the below to wipe the table clean before populating
		//DB::table($this->table)->truncate();

		parent::run();
		
		Artisan::call('init:parts');
	}
}