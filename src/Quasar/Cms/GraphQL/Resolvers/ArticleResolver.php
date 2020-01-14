<?php namespace Quasar\Cms\GraphQL\Resolvers;

use Quasar\Core\GraphQL\Resolvers\CoreResolver;
use Quasar\Core\Services\SQLService;
use Quasar\Admin\Services\AttachmentService;
use Quasar\Cms\Models\Article;
use Quasar\Cms\Services\ArticleService;

class ArticleResolver extends CoreResolver
{
    public function __construct(Article $model, ArticleService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }

    public function delete($root, array $args)
    {
        $object = SQLService::deleteRecord($args['uuid'], Article::class, $args['langUuid']);

        if (base_lang_uuid() === $object->langUuid)
        {
            $object->sections()->detach();
            $object->sections()->detach();
        }
        
        // delete attachments
        AttachmentService::deleteAttachments($args['uuid'], Article::class, $args['langUuid']);

        return $object;
    }
}
