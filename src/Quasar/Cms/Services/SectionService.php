<?php namespace Quasar\Cms\Services;

use Quasar\Core\Services\CoreService;
use Quasar\Cms\Models\Section;

class SectionService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'                  => 'nullable|uuid',
            'anchor'                => 'required|between:2,255|unique:cms_section,anchor',
            'name'                  => 'required|between:2,255',
            'familyUuid'            => 'nullable|uuid|exists:cms_family,uuid'
        ]);

        return Section::create($data)->fresh();
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'uuid'                  => 'nullable|uuid',
            'anchor'                => 'required|between:2,255|unique:cms_section,anchor',
            'name'                  => 'required|between:2,255',
            'familyUuid'            => 'nullable|uuid|exists:cms_family,uuid'
        ]);

        $object = Section::where('uuid', $uuid)->first();

        // fill data
        $object->fill($data);

        // save changes
        $object->save();

        return $object;
    }
}
