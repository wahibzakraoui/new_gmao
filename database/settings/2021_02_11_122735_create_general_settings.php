<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'KERP');
        $this->migrator->add('general.site_active', true);
        $this->migrator->add('general.module_receptions', true);
        $this->migrator->add('general.moule_data', '[{"to": 6, "from": 4}, {"to": 8, "from": 6}, {"to": 10, "from": 8}, {"to": 12, "from": 10}, {"to": 14, "from": 12}, {"to": 16, "from": 14}, {"to": 18, "from": 16}, {"to": 20, "from": 18}]');
    }
}
