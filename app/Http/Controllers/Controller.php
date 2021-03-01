<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function getSettings($setting_name = null){
        if($setting_name) return app(GeneralSettings::class)->{$setting_name};
        return app(GeneralSettings::class);
    }
    protected function getDayOfYear(){
        return Carbon::now()->dayOfYear();
    }
}
