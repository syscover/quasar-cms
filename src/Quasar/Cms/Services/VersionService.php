<?php namespace Quasar\Cms\Services;

use Quasar\Core\Services\CoreService;
use Quasar\Cms\Models\Version;

class VersionService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'                      => 'nullable|uuid',
            'name'                      => 'required|between:2,255',
            'hasCurrentContent'         => 'nullable|boolean'
        ]);

        $object = Version::create($data)->fresh();
        
        return $object;
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'id'                        => 'required|integer',
            'uuid'                      => 'required|uuid',
            'name'                      => 'required|between:2,255',
            'hasCurrentContent'         => 'nullable|boolean'
        ]);

        $object = Version::where('uuid', $uuid)->first();

        // fill data
        $object->fill($data);

        // save changes
        $object->save();

        return $object;
    }
}
