<?php namespace Quasar\Cms\GraphQL\Resolvers;

use Quasar\Cms\Models\Article;
use Quasar\Cms\Services\ArticleService;
use Quasar\Core\GraphQL\Resolvers\CoreResolver;

class ArticleResolver extends CoreResolver
{
    public function __construct(Article $model, ArticleService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
