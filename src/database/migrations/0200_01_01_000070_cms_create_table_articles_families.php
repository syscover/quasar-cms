<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsCreateTableArticlesFamilies extends Migration 
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('cms_articles_families'))
        {
            Schema::create('cms_articles_families', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->uuid('article_uuid');
                $table->uuid('family_uuid');

                $table->primary(['article_uuid', 'family_uuid']);
                $table->foreign('article_uuid', 'cms_articles_families_article_uuid_fk')
                    ->references('uuid')
                    ->on('cms_article')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('family_uuid', 'cms_articles_families_family_uuid_fk')
                    ->references('uuid')
                    ->on('cms_family')
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
        Schema::dropIfExists('cms_articles_families');
	}
}