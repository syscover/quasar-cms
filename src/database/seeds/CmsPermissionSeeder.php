<?php

use Illuminate\Database\Seeder;
use Quasar\Admin\Models\Permission;

class CmsPermissionSeeder extends Seeder
{
    public function run()
    {
        Permission::insert([

            // cms
            ['uuid' => 'a38bb07f-26a2-4715-ab3f-ae82b09c6312',  'name' => 'cms.access',                                 'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => '07eb08c6-8ab3-4649-ad81-f817b120ad92',  'name' => 'cms.family.access',                          'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => '04b4bedb-862c-4f65-8266-395b80eec53d',  'name' => 'cms.family.list',                            'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => '66ef2d08-838e-4a7d-addf-8376bab3653d',  'name' => 'cms.family.create',                          'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => '6989f520-e66c-41a0-89c1-6fa192a88697',  'name' => 'cms.family.get',                             'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="CmsPermissionSeeder"
 */
