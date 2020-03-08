<?php namespace Quasar\Cms\Listeners;

use Quasar\OAuth\Traits\RestHookable;
use Quasar\Cms\Events\ArticleCreated;

class ArticleCreatedListener
{
    use RestHookable;

    public function handle(ArticleCreated $event)
    {
        $this->restHook->fire($event->restHookEvent, $event->article);
    }
}