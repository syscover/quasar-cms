<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsCreateTableSection extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('cms_section'))
        {
            Schema::create('cms_section', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->uuid('uuid');
                $table->string('anchor', 30);
                $table->string('name');
                $table->uuid('family_uuid')->nullable();
                $table->json('attachment_families')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index('uuid', 'cms_family_uuid_idx');
                $table->unique('anchor', 'cms_family_anchor_uq');
                $table->foreign('family_uuid', 'cms_section_family_uuid_fk')
                    ->references('uuid')
                    ->on('cms_family')
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
        Schema::dropIfExists('cms_section');
    }
}