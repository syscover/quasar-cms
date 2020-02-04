<?php namespace Quasar\Cms\Models;

use Quasar\Core\Models\CoreModel;
use Quasar\Admin\Traits\Langable;

/**
 * Class Category
 * @package Quasar\Cms\Models
 */

class Category extends CoreModel
{
    use Langable;

	protected $table        = 'cms_category';
	protected $fillable     = ['uuid', 'commonUuid', 'langUuid', 'name', 'slug', 'sectionUuid', 'sort', 'dataLang', 'data'];
    protected $casts        = [
        'data_lang' => 'array',
        'data'      => 'array'
    ];
    public $with            = ['lang'];

    public function scopeBuilder($query)
    {
        return $query
            ->leftJoin('cms_section', 'cms_category.section_uuid', '=', 'cms_section.uuid')
            ->addSelect('cms_section.*', 'cms_category.*', 'cms_section.name as cms_section_name', 'cms_category.name as cms_category_name');
    }

    // ATTENTION, cyclic relationship load, can not to be in $with array
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_uuid', 'uuid');
    }
}
