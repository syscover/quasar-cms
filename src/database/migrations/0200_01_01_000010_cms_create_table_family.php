<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CmsCreateTableFamily extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('cms_family'))
        {
            Schema::create('cms_family', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->uuid('uuid');
                $table->string('name');

                // 1 - Froala Wysiwyg
                // 2 - ContentBuilder
                // 3 - Froala Pages
                // 4 - TextArea
                $table->uuid('excerpt_editor_uuid')->nullable();
                $table->uuid('article_editor_uuid')->nullable();
                $table->uuid('field_group_uuid')->nullable();
                $table->boolean('date')->default(false);
                $table->boolean('title')->default(false);
                $table->boolean('slug')->default(false);
                $table->boolean('link')->default(false);
                $table->boolean('categories')->default(false);
                $table->boolean('tags')->default(false);
                $table->boolean('article_parent')->default(false);
                $table->boolean('attachments')->default(false);
                $table->boolean('sort')->default(false);
                $table->json('data')->nullable();

                $table->timestamps();
                $table->softDeletes();

                $table->index('uuid', 'cms_family_uuid_idx');
                $table->index('slug', 'cms_family_slug_idx');
                $table->foreign('field_group_uuid', 'cms_family_field_group_uuid_fk')
                    ->references('uuid')
                    ->on('admin_field_group')
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
        Schema::dropIfExists('cms_family');
    }
}