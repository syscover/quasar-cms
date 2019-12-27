<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsCreateTableSectionsAttachmentFamilies extends Migration 
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('cms_sections_attachment_families'))
        {
            Schema::create('cms_sections_attachment_families', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->uuid('section_uuid');
                $table->uuid('attachment_family_uuid');

                $table->primary(['section_uuid', 'attachment_family_uuid']);
                $table->foreign('section_uuid', 'cms_sections_attachment_families_section_uuid_fk')
                    ->references('uuid')
                    ->on('cms_section')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                //'cms_sections_attachment_families_section_uuid_attachment_family_uuid_primary' is too long"
                $table->foreign('attachment_family_uuid', 'cms_sections_attachment_families_attachment_family_uui_fk')
                    ->references('uuid')
                    ->on('admin_attachment_family')
                    ->onDelete('cascade')
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
        Schema::dropIfExists('cms_sections_attachment_families');
	}
}