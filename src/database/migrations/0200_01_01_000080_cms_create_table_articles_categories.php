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

                $table->uuid('article_uuid');
                $table->uuid('category_uuid');

                $table->primary(['article_uuid', 'category_uuid']);
                $table->foreign('article_uuid', 'cms_articles_categories_article_uuid_fk')
                    ->references('uuid')
                    ->on('cms_article')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                $table->foreign('category_uuid', 'cms_articles_categories_category_uuid_fk')
                    ->references('uuid')
                    ->on('cms_category')
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
        Schema::dropIfExists('cms_articles_categories');
	}
}