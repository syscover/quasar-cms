<?php namespace Quasar\Cms\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class Family
 * @package Quasar\Cms\Models
 */

class Family extends CoreModel
{
    protected $table        = 'cms_family';
    protected $fillable     = ['uuid', 'name', 'excerptEditorUuid', 'articleEditorUuid', 'fieldGroupUuid', 'hasDatetime', 'hasTitle', 'hasSlug', 'hasLink', 'hasCategories', 'hasTags', 'hasArticleParent', 'hasAttachments', 'hasSort', 'data'];
    protected $casts        = [
        'has_datetime'          => 'boolean',
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
