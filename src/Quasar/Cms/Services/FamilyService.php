<?php namespace Quasar\Cms\Services;

use Quasar\Core\Services\CoreService;
use Quasar\Cms\Models\Family;

class FamilyService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'                  => 'nullable|uuid',
            'name'                  => 'required|between:2,255',
            'excerptEditorUuid'     => 'nullable|uuid',
            'articleEditorUuid'     => 'nullable|uuid',
            'fieldGroupUuid'        => 'nullable|uuid|exists:admin_field_group,uuid',
            'hasDatetime'           => 'nullable|boolean',
            'hasTitle'              => 'nullable|boolean',
            'hasSlug'               => 'nullable|boolean',
            'hasLink'               => 'nullable|boolean',
            'hasCategories'         => 'nullable|boolean',
            'hasTags'               => 'nullable|boolean',
            'hasArticleParent'      => 'nullable|boolean',
            'hasAttachments'        => 'nullable|boolean',
            'hasSort'               => 'nullable|boolean',
            'data'                  => 'nullable|JSON'
        ]);

        return Family::create($data)->fresh();
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'id'                    => 'required|integer',
            'uuid'                  => 'required|uuid',
            'name'                  => 'required|between:2,255',
            'excerptEditorUuid'     => 'nullable|uuid',
            'articleEditorUuid'     => 'nullable|uuid',
            'fieldGroupUuid'        => 'nullable|uuid|exists:admin_field_group,uuid',
            'hasDatetime'           => 'boolean',
            'hasTitle'              => 'boolean',
            'hasSlug'               => 'boolean',
            'hasLink'               => 'boolean',
            'hasCategories'         => 'boolean',
            'hasTags'               => 'boolean',
            'hasArticleParent'      => 'boolean',
            'hasAttachments'        => 'boolean',
            'hasSort'               => 'boolean',
            'data'                  => 'nullable|JSON'
        ]);

        $object = Family::where('uuid', $uuid)->first();

        // fill data
        $object->fill($data);

        // save changes
        $object->save();

        return $object;
    }
}
