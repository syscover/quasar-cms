<?php namespace Quasar\Cms\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class Version
 * @package Quasar\Cms\Models
 */

class Version extends CoreModel
{
    protected $table        = 'cms_version';
    protected $fillable     = ['uuid', 'name', 'hasCurrentContent'];

    public function articles()
    {
        return $this->hasMany(Article::class, 'version_uuid', 'uuid');
    }
}
