<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsCreateTableArticlesCategories extends Migration 
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if(! Schema::hasTable('cms_articles_categories'))
        {
            Schema::create('cms_articles_categories', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->uuid('article_common_uuid');
                $table->uuid('category_common_uuid');

                // name 'cms_articles_categories_article_common_uuid_category_common_uuid_pk' is too long"
                $table->primary(['article_common_uuid', 'category_common_uuid'], 'cms_articles_categories_article_common_uuid_category_common_u_pk');
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
        Schema::dropIfExists('cms_articles_categories');
	}
}