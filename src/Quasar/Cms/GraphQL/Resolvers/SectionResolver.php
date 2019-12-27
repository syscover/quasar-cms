<?php namespace Quasar\Cms\GraphQL\Resolvers;

use Quasar\Cms\Models\Section;
use Quasar\Cms\Services\SectionService;
use Quasar\Core\GraphQL\Resolvers\CoreResolver;

class SectionResolver extends CoreResolver
{
    public function __construct(Section $model, SectionService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
