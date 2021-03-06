<?php namespace Quasar\Cms\Models;

use Laravel\Scout\Searchable;
use Quasar\Core\Models\CoreModel;
use Quasar\Core\Traits\CanManageDataLang;
use Quasar\Admin\Traits\CustomizableValues;
use Quasar\Admin\Traits\Langable;
use Quasar\Admin\Models\Attachment;

/**
 * Class Article
 * @package Quasar\Cms\Models
 */

class Article extends CoreModel
{
    use Langable, CanManageDataLang, CustomizableValues;
    use Searchable;

    protected $table        = 'cms_article';
    protected $fillable     = [
        'uuid', 
        'commonUuid', 
        'langUuid', 
        'parentUuid', 
        'authorUuid', 
        'authorType', 
        'name', 
        'statusUuid', 
        'publish', 
        'versionUuid', 
        'title', 
        'slug',
        'link',
        'blank',
        'datetime',
        'tags',
        'excerpt',
        'article',
        'sort',
        'data'
    ];
    protected $casts        = [
        'tags'      => 'array',
        'data_lang' => 'array',
        'data'      => 'array'
    ];
    public $with = ['sections', 'families', 'categories', 'author', 'attachments'];
    
    public function attachments()
    {
        return $this->morphMany(
                Attachment::class,
                'attachable',
                'attachable_type',
                'attachable_uuid',
                'uuid'
            )
            ->orderBy('sort', 'asc');
    }

    public function author()
    {
        return $this->morphTo('author', 'author_type', 'author_uuid', 'uuid');
    }

    public function families()
    {
        return $this->belongsToMany(
            Family::class,
            'cms_articles_families',
            'article_common_uuid',
            'family_uuid',
            'common_uuid',
            'uuid'
        );
    }

    public function sections()
    {
        return $this->belongsToMany(
            Section::class,
            'cms_articles_sections',
            'article_common_uuid',
            'section_uuid',
            'common_uuid',
            'uuid'
        );
    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'cms_articles_categories',
            'article_common_uuid',
            'category_common_uuid',
            'common_uuid',
            'common_uuid'
        );
    }

    public function toIndexableArray()
    {
        return [
            'permissionUuid'    => '205e2c88-2254-45d2-91df-615ca95983ac',
            'indexableType'     => self::class,
            'indexableUuid'     => $this->uuid,
            'url'               => '/app/cms/article/edit/' . $this->langUuid . '/' . $this->commonUuid,
            'title'             => $this->name,
            'contentLayer1'     => $this->title,
            'contentLayer2'     => $this->excerpt,
            'contentLayer3'     => $this->article,
        ];
    }
}
