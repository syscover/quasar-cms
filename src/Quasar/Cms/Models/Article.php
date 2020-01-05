<?php namespace Quasar\Cms\Models;

use Quasar\Core\Models\CoreModel;
use Quasar\Admin\Traits\Langable;
use Quasar\Core\Traits\CanManageDataLang;

/**
 * Class Article
 * @package Quasar\Cms\Models
 */

class Article extends CoreModel
{
    use Langable, CanManageDataLang;

    protected $table        = 'cms_article';
    protected $fillable     = [
        'id', 
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
        'excerpt',
        'article'
    ];
    public $with            = ['sections', 'families', 'author'];

    public function sections()
    {
        return $this->belongsToMany(
            Section::class,
            'cms_articles_sections',
            'article_uuid',
            'section_uuid',
            'uuid',
            'uuid'
        );
    }

    public function families()
    {
        return $this->belongsToMany(
            Family::class,
            'cms_articles_families',
            'article_uuid',
            'family_uuid',
            'uuid',
            'uuid'
        );
    }

    public function author()
    {
        return $this->morphTo('author', 'author_type', 'author_uuid', 'uuid');
    }
}
