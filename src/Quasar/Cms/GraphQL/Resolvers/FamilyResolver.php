<?php namespace Quasar\Cms\GraphQL\Resolvers;

use Quasar\Cms\Models\Family;
use Quasar\Cms\Services\FamilyService;
use Quasar\Core\GraphQL\Resolvers\CoreResolver;

class FamilyResolver extends CoreResolver
{
    public function __construct(Family $model, FamilyService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
