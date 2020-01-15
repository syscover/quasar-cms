<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsCreateTableArticle extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('cms_article'))
        {
            Schema::create('cms_article', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->uuid('uuid');
                $table->uuid('common_uuid');
                $table->uuid('lang_uuid');
                $table->uuid('parent_uuid')->nullable();                                    // set parent article if you need group articles
                $table->uuid('author_uuid');
                $table->string('author_type');
                $table->string('name');                                                     // name of the article
                $table->uuid('status_uuid');                                                // 0 = draft 1 = publish
                $table->timestamp('publish')->default(DB::raw('CURRENT_TIMESTAMP'));        // date when will be publish
                $table->uuid('version_uuid')->nullable();                                   // version or article to preview content
                $table->string('title', 510)->nullable();               
                $table->string('slug')->nullable();
                $table->string('link')->nullable();
                $table->boolean('blank')->default(false);
                $table->timestamp('datetime')->nullable();                                  // date of article
                $table->json('tags')->nullable();
                $table->text('excerpt')->nullable();
                $table->longText('article')->nullable();
                $table->integer('sort')->unsigned()->nullable();
                $table->json('data_lang')->nullable();
                $table->json('data')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index('uuid', 'cms_article_uuid_idx');
                $table->index('common_uuid', 'cms_article_common_uuid_idx');
                $table->index('slug', 'cms_article_slug_idx');
                $table->unique(['lang_uuid', 'slug'], 'cms_article_lang_id_slug_uq');

                $table->foreign('lang_uuid', 'cms_article_lang_uuid_fk')
                    ->references('uuid')
                    ->on('admin_lang')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
                $table->foreign('version_uuid', 'cms_article_version_uuid_fk')
                    ->references('uuid')
                    ->on('cms_version')
                    ->onDelete('set null')
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
        Schema::dropIfExists('cms_article');
    }
}
