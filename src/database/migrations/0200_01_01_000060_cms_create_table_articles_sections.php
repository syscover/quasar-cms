<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsCreateTableArticlesSections extends Migration 
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('cms_articles_sections'))
        {
            Schema::create('cms_articles_sections', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->uuid('article_uuid');
                $table->uuid('section_uuid');

                $table->primary(['article_uuid', 'section_uuid']);
                $table->foreign('article_uuid', 'cms_articles_sections_article_uuid_fk')
                    ->references('uuid')
                    ->on('cms_article')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('section_uuid', 'cms_articles_sections_section_uuid_fk')
                    ->references('uuid')
                    ->on('cms_section')
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
        Schema::dropIfExists('cms_articles_sections');
	}
}