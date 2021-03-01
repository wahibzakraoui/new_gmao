<?php 

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    
    public bool $site_active;
    public bool $module_receptions;
    public string $moule_data;
    
    public static function group(): string
    {
        return 'general';
    }

}
