<?php namespace Quasar\Cms\GraphQL\Resolvers;

use Quasar\Core\GraphQL\Resolvers\CoreResolver;

use Quasar\Cms\Models\Article;
use Quasar\Cms\Services\ArticleService;

class ArticleResolver extends CoreResolver
{
    public function __construct(Article $model, ArticleService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
