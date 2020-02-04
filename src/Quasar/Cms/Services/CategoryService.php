<?php namespace Quasar\Cms\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Quasar\Core\Services\CoreService;
use Quasar\Cms\Models\Category;

class CategoryService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'                      => 'nullable|uuid',
            'commonUuid'                => 'nullable|uuid',
            'langUuid'                  => 'required|uuid|exists:admin_lang,uuid',
            'name'                      => 'required|between:2,255',
            'slug'                      => 'required|between:1,255',
            'section_uuid'              => 'nullable|uuid',
            'sort'                      => 'nullable|integer'
        ]);

        // create commonUuid if not exist
        $data['commonUuid'] = $data['commonUuid'] ?? Str::uuid();
        $object = null;

        DB::transaction(function () use ($data, &$object)
        {
            // create
            $object = Category::create($data)->fresh();

            // add data lang for element
            $object->addDataLang();
        });

        return $object;
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'id'                        => 'required|integer',
            'uuid'                      => 'nullable|uuid',
            'commonUuid'                => 'nullable|uuid',
            'langUuid'                  => 'required|uuid|exists:admin_lang,uuid',
            'name'                      => 'required|between:2,255',
            'slug'                      => 'required|between:1,255',
            'section_uuid'              => 'nullable|uuid',
            'sort'                      => 'nullable|integer'
        ]);

        $object = null;

        DB::transaction(function () use ($data, $uuid, &$object)
        {
            $object = Category::where('uuid', $uuid)->first();

            // fill data
            $object->fill($data);

            // save changes
            $object->save();
        });

        return $object;
    }
}
