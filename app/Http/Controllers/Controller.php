<?php

namespace App\Http\Controllers;


use App\Exceptions\PermissionDeniedException;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Settings\GeneralSettings;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param null $setting_name
     * @return GeneralSettings|mixed
     */
    public function getSettings($setting_name = null): GeneralSettings
    {
        if($setting_name) {
            return app(GeneralSettings::class)->{$setting_name};
        }
        return app(GeneralSettings::class);
    }

    /**
     * @return Carbon|int
     */
    protected function getDayOfYear(){
        return Carbon::now()->dayOfYear();
    }

    /**
     * @param Request $request
     * @param $action
     * @param $module
     * @return bool
     * @throws PermissionDeniedException
     */
    protected function checkPerms(Request $request, $action, $module) : bool{
        if(!auth()->user()->can("{$action} {$module}")){
            throw new PermissionDeniedException($request);
        }
        return true;
    }
}
