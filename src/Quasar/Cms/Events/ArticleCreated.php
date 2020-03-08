<?php namespace Quasar\Cms\Events;

use Quasar\OAuth\Support\RestHook;
use Quasar\Cms\Models\Article;

class ArticleCreated
{
    public $restHookEvent = RestHook::CMS_ARTICLE_CREATED;
    public $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }
}