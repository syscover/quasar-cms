<?php namespace Quasar\Cms\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Quasar\Core\Services\CoreService;
use Quasar\Core\Services\SQLService;
use Quasar\Admin\Services\AttachmentService;
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
            'sort'                  => 'nullable|integer',
        ]);

        // create commonUuid
        $data['commonUuid'] = $data['commonUuid'] ?? Str::uuid();
        
        // set custom fields
        $data['data']['customFields'] = $data['customFields'] ?? null;
        
        $object = null;

        DB::transaction(function () use ($data, &$object)
        {
            // create
            $object = Article::create($data)->fresh();

            // add sections
            $object->sections()->sync($data['sectionsUuid']);

            // add families
            $object->families()->sync($data['familiesUuid']);

            // add categories
            $object->categories()->sync($data['categoriesCommonUuid']);

            // add data lang for element
            $object->addDataLang();

            // parse html and manage img of wysiwyg
            $html = AttachmentService::storeFroalaAttachments($object->article, 'storage/app/public/cms/articles', 'storage/cms/articles', $object->uuid);

            if ($html !== null)
            {
                $object->article = $html;
                $object->save();
            }

            // store attachments library
            AttachmentService::storeAttachments($data['attachments'], 'storage/app/public/cms/articles', 'storage/cms/articles', Article::class, $object->uuid,  $object->langUuid);
        });
        
        return $object;
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

        // set custom fields
        $data['data']['customFields'] = $data['customFields'] ?? null;

        $object = null;

        DB::transaction(function () use ($data, $uuid, &$object)
        {
            $object = Article::where('uuid', $uuid)->first();

            // fill data
            $object->fill($data);

            // set wysiwyg attachments
            $object->article = AttachmentService::storeFroalaAttachments($object->article, 'storage/app/public/cms/articles', 'storage/cms/articles', $object->uuid);

            // save changes
            $object->save();

            // add sections
            $object->sections()->sync($data['sectionsUuid']);

            // add families
            $object->families()->sync($data['familiesUuid']);

            // add categories
            $object->categories()->sync($data['categoriesCommonUuid']);

            // update attachments library
            AttachmentService::updateAttachments($data['attachments'], 'storage/app/public/cms/articles', 'storage/cms/articles', Article::class, $object->uuid,  $object->langUuid);
        });

        return $object;
    }

    public function delete($data, $model)
    {
        $objects = SQLService::deleteRecord($data['uuid'], $model);

        if ($objects->contains('langUuid', baseLangUuid()))
        {
            $object = $objects->first();

            $object->sections()->detach();
            $object->families()->detach();
            $object->categories()->detach();
        }

        // delete attachments
        AttachmentService::deleteAttachments($objects->pluck('uuid'));

        return $objects;
    }
}
