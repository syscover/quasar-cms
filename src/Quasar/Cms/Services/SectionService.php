<?php namespace Quasar\Cms\Services;

use Quasar\Core\Services\CoreService;
use Quasar\Cms\Models\Section;

class SectionService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'                      => 'nullable|uuid',
            'anchor'                    => 'required|between:2,255|unique:cms_section,anchor',
            'name'                      => 'required|between:2,255',
            'familyUuid'                => 'nullable|uuid|exists:cms_family,uuid',
            'attachmentFamiliesUuid'    => 'nullable|array'
        ]);

        $object = Section::create($data)->fresh();

        // update attachment families
        $object->attachmentFamilies()->sync($data['attachmentFamiliesUuid']);
        
        return $object;
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'id'                        => 'required|integer',
            'uuid'                      => 'required|uuid',
            'anchor'                    => 'required|between:2,255|unique:cms_section,anchor,' . $uuid . ',uuid',
            'name'                      => 'required|between:2,255',
            'familyUuid'                => 'nullable|uuid|exists:cms_family,uuid',
            'attachmentFamiliesUuid'    => 'nullable|array'
        ]);

        $object = Section::where('uuid', $uuid)->first();

        // fill data
        $object->fill($data);

        // save changes
        $object->save();

        // update attachment families
        $object->attachmentFamilies()->sync($data['attachmentFamiliesUuid']);

        return $object;
    }
}
