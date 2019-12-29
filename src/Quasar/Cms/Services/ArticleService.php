<?php namespace Quasar\Cms\Services;

use Quasar\Core\Services\CoreService;
use Quasar\Cms\Models\Article;

class ArticleService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'                  => 'nullable|uuid',
            'commonUuid'            => 'nullable|uuid',
            'langUuid'              => 'required|uuid|exists:admin_lang,uuid',
            'parentUuid'            => 'nullable|uuid|exists:cms_article,uuid',
            'authorUuid'            => 'required|uuid',
            'authorType'            => 'required|between:2,255',
            'name'                  => 'required|between:2,255',
            'statusUuid'            => 'required|uuid',
            'versionUuid'           => 'nullable|uuid',
            'title'                 => 'nullable|between:2,510',
        ]);

        return Article::create($data)->fresh();
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'id'                    => 'required|integer',
            'uuid'                  => 'required|uuid',
            'commonUuid'            => 'required|uuid',
            'langUuid'              => 'required|uuid|exists:admin_lang,uuid',
            'parentUuid'            => 'nullable|uuid|exists:cms_article,uuid',
            'authorUuid'            => 'required|uuid',
            'authorType'            => 'required|between:2,255',
            'name'                  => 'required|between:2,255',
            'statusUuid'            => 'required|uuid',
            'versionUuid'           => 'nullable|uuid',
            'title'                 => 'nullable|between:2,510',
        ]);

        $object = Article::where('uuid', $uuid)->first();

        // fill data
        $object->fill($data);

        // save changes
        $object->save();

        return $object;
    }
}