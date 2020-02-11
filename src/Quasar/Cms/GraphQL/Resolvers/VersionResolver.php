<?php namespace Quasar\Cms\GraphQL\Resolvers;

use Quasar\Cms\Models\Version;
use Quasar\Cms\Services\VersionService;
use Quasar\Core\GraphQL\Resolvers\CoreResolver;

class VersionResolver extends CoreResolver
{
    public function __construct(Version $model, VersionService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
