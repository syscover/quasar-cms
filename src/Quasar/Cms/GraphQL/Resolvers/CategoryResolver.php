<?php namespace Quasar\Cms\GraphQL\Resolvers;

use Quasar\Cms\Models\Category;
use Quasar\Cms\Services\CategoryService;
use Quasar\Core\GraphQL\Resolvers\CoreResolver;

class CategoryResolver extends CoreResolver
{
    public function __construct(Category $model, CategoryService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
