<?php namespace Quasar\Cms\Support;

use Quasar\Cms\Models\Article;

class Publisher
{
    public static function articles($anchor, $langUuid = null)
    {
        $articles = Article::whereHas('sections', function($q) use ($anchor) {
                $q->where('anchor', $anchor);
            })
            ->where('status_uuid', '8d1fe36a-e119-41e4-a48f-ca6614cc0305') // publish status
            ->where('publish', '<' , now())
            ->where('lang_uuid', $langUuid ?? base_lang_uuid())
            ->orderBy('sort', 'desc')
            ->orderBy('publish', 'desc')
            ->get();

        return $articles;
    }

    public static function article($slug, $langUuid = null)
    {
        $article = Article::where('status_uuid', '8d1fe36a-e119-41e4-a48f-ca6614cc0305') // publish status
            ->where('publish', '<' , now())
            ->where('lang_uuid', $langUuid ?? base_lang_uuid())
            ->where('slug', $slug)
            ->orderBy('publish', 'desc')
            ->first();

        return $article;
    }
}
