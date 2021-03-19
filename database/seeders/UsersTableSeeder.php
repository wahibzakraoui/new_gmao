<?php
namespace Database\Seeders;
use App\Models\User;
use Flynsarmy\CsvSeeder\CsvSeeder;

use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends CsvSeeder {

	public function __construct()
	{
		$this->table = 'users';
		$this->filename = base_path().'/database/csv/users.csv';
		$this->hashable = ['password'];
	}

	public function run()
	{
		// Recommended when importing larger CSVs
		//DB::disableQueryLog();

		// Uncomment the below to wipe the table clean before populating
		//DB::table($this->table)->truncate();

        parent::run();
        // activate default users
        User::find(1)->update(['email_verified_at' => now()]);
        User::find(2)->update(['email_verified_at' => now()]);
	}
}
