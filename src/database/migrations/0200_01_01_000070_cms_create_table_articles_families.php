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

                $table->uuid('article_common_uuid');
                $table->uuid('family_uuid');

                $table->primary(['article_common_uuid', 'family_uuid']);
                // can't to have foreign because attachment_family_uuid can belong to various multi language elements
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