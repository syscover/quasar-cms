<?php

use Illuminate\Database\Seeder;
use Quasar\Admin\Models\Resource;

class CmsResourceSeeder extends Seeder
{
    public function run()
    {
        Resource::insert([
            ['uuid' => '873f3c82-feb8-481a-82c9-f94cc3bda667',      'name' => 'cms',                                'has_custom_fields' => false,   'has_attachments' => false,     'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => 'e0915ea3-09b0-4edf-ad45-0fe802c7094b',      'name' => 'cms.article',                        'has_custom_fields' => false,   'has_attachments' => false,     'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => '2aa6f98b-a5da-4947-87aa-2b75a533bdcb',      'name' => 'cms.category',                       'has_custom_fields' => false,   'has_attachments' => false,     'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => 'bbd5dfe3-e515-40ba-8cd7-4e1da386e366',      'name' => 'cms.family',                         'has_custom_fields' => true,    'has_attachments' => false,     'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
            ['uuid' => '2639b26a-31a5-4c0d-9778-28dbf48f0d6c',      'name' => 'cms.section',                        'has_custom_fields' => false,   'has_attachments' => true,      'package_uuid' => 'dfb01738-2abc-4d42-8c5e-14d75f2b26fe'],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="CmsResourceSeeder"
 */
