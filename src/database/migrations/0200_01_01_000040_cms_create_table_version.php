<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsCreateTableVersion extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('cms_version'))
        {
            Schema::create('cms_version', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->uuid('uuid');
                $table->string('name');
                $table->boolean('has_current_content')->default(false);

                $table->timestamps();
                $table->softDeletes();

                $table->index('uuid', 'cms_version_uuid_idx');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms_version');
    }

}
