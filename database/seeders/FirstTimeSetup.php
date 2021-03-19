<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class FirstTimeSetup extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        Artisan::call('permission:cache-reset');
        Artisan::call('init:parts');
        //Artisan::call('DoWork');
        Artisan::call('buyables');
    }
}
