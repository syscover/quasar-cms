<?php namespace Quasar\Cms\Models;

use Quasar\Core\Models\CoreModel;
use Quasar\Admin\Models\AttachmentFamily;

/**
 * Class Section
 * @package Quasar\Cms\Models
 */

class Section extends CoreModel
{
    protected $table        = 'cms_section';
    protected $fillable     = ['uuid', 'anchor', 'name', 'familyUuid'];
    public $with            = ['attachmentFamilies', 'family'];

    public function attachmentFamilies()
    {
        return $this->belongsToMany(
            AttachmentFamily::class,
            'cms_sections_attachment_families',
            'section_uuid',
            'attachment_family_uuid',
            'uuid',
            'uuid'
        );
    }

    public function family()
    {
        return $this->belongsTo(Family::class, 'family_uuid', 'uuid');
    }
}
