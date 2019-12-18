<?php namespace Quasar\Cms\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class Family
 * @package Quasar\Cms\Models
 */

class Family extends CoreModel
{
    protected $table        = 'cms_family';
    protected $fillable     = ['id', 'uuid', 'name', 'excerpt_editor_uuid', 'article_editor_uuid', 'field_group_uuid', 'has_date', 'has_title', 'has_slug', 'has_link', 'has_categories', 'has_tags', 'has_article_parent', 'has_attachments', 'has_sort', 'data'];
    protected $casts        = [
        'has_date'              => 'boolean',
        'has_title'             => 'boolean',
        'has_slug'              => 'boolean',
        'has_link'              => 'boolean',
        'has_categories'        => 'boolean',
        'has_tags'              => 'boolean',
        'has_article_parent'    => 'boolean',
        'has_attachments'       => 'boolean',
        'has_sort'              => 'boolean',
        'data'                  => 'array'
    ];
}
