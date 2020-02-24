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
            ['uuid' => '8ce583d0-b969-4d76-8813-d0aa51d80e56',  'name' => 'cms.article.access',                         'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => '4cd4d822-66fe-4249-9dfa-7a06cb6c1592',  'name' => 'cms.article.list',                           'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => 'c28c6772-a846-4ae5-9126-2931c9b1b0b7',  'name' => 'cms.article.create',                         'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => '205e2c88-2254-45d2-91df-615ca95983ac',  'name' => 'cms.article.get',                            'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            
            ['uuid' => 'ef377a6d-108d-48c9-9e23-ccc1ed1319e9',  'name' => 'cms.category.access',                        'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => '5777c974-e5e4-4a6a-ac42-181aefc0088a',  'name' => 'cms.category.list',                          'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => '3eb22afc-16c7-468c-849a-244fde65f266',  'name' => 'cms.category.create',                        'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => '01b686c6-4e55-482f-a645-0e064069108c',  'name' => 'cms.category.get',                           'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'], 
            
            ['uuid' => '07eb08c6-8ab3-4649-ad81-f817b120ad92',  'name' => 'cms.family.access',                          'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => '04b4bedb-862c-4f65-8266-395b80eec53d',  'name' => 'cms.family.list',                            'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => '66ef2d08-838e-4a7d-addf-8376bab3653d',  'name' => 'cms.family.create',                          'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => '6989f520-e66c-41a0-89c1-6fa192a88697',  'name' => 'cms.family.get',                             'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            
            ['uuid' => '803d0313-326a-4cfb-9ed5-1c90f89b980f',  'name' => 'cms.section.access',                         'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => 'df3adb90-aa32-4658-ae67-eb3085dbea4e',  'name' => 'cms.section.list',                           'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => 'd4540e1e-3a25-4ebf-bffd-895407965a34',  'name' => 'cms.section.create',                         'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => 'e8917354-acf4-4d77-b8d6-0eb93f68e8d7',  'name' => 'cms.section.get',                            'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            
            ['uuid' => '8a9f3a2d-e156-4345-81d6-e0ffe7ef729e',  'name' => 'cms.version.access',                         'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => '15732eaa-f1cb-48c8-b452-5825a67eaf5b',  'name' => 'cms.version.list',                           'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => '188c595b-91df-4ec4-806b-caba3581817e',  'name' => 'cms.version.create',                         'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => 'c031cc24-9bf5-4ae0-9c41-1d3b66fe9c76',  'name' => 'cms.version.get',                            'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="CmsPermissionSeeder"
 */
