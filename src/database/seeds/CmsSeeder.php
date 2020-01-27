<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CmsSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(CmsPackageSeeder::class);
        $this->call(CmsPermissionSeeder::class);
        $this->call(CmsResourceSeeder::class);
        $this->call(CmsPermissionsRolesSeeder::class);
        
        Model::reguard();
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="CmsSeeder"
 */
