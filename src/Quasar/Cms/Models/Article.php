<?php namespace Quasar\Cms\Models;

use Quasar\Core\Models\CoreModel;
use Quasar\Admin\Traits\Langable;


/**
 * Class Article
 * @package Quasar\Cms\Models
 */

class Article extends CoreModel
{
    use Langable;

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
        'slug'
    ];
    public $with            = [];
}
