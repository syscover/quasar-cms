<?php

use Illuminate\Database\Seeder;
use Quasar\Admin\Models\Package;

class CmsPackageSeeder extends Seeder
{
    public function run()
    {
        Package::insert([
            ['id' => 200,   'uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe',   'name' => 'Cms',    'root' => 'cms',    'sort' => 200,  'is_active' => 1]
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="CmsPackageSeeder"
 */
