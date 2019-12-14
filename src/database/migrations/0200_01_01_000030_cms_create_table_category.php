<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsCreateTableCategory extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('cms_category'))
        {
            Schema::create('cms_category', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->uuid('uuid');
                $table->uuid('common_uuid');
                $table->uuid('lang_uuid');
                $table->string('name');
                $table->string('slug')->nullable();
                $table->uuid('section_uuid')->nullable();
                $table->integer('sort')->unsigned()->nullable();
                $table->json('data_lang')->nullable();
                $table->json('data')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index('uuid', 'cms_category_uuid_idx');
                $table->index('slug', 'cms_category_slug_idx');

                $table->foreign('lang_uuid', 'cms_category_lang_uuid_fk')
                    ->references('uuid')
                    ->on('admin_lang')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('section_uuid', 'cms_category_section_uuid_fk')
                    ->references('uuid')
                    ->on('cms_section')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('cms_category');
    }

}
