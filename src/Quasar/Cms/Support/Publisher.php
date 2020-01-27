<?php namespace Quasar\Cms\Support;

use Quasar\Cms\Models\Article;

class Publisher
{
    public static function articles($anchor, $data = [])
    {
        $query = Article::whereHas('sections', function($q) use ($anchor) {
                $q->where('anchor', $anchor);
            })
            ->where('status_uuid', '8d1fe36a-e119-41e4-a48f-ca6614cc0305') // publish status
            ->where('publish', '<' , now())
            ->where('lang_uuid', $data['langUuid'] ?? base_lang_uuid());

        foreach ($data as $key => $value)
        {
            switch ($key)
            {
                case 'sort':
                    $query->orderBy('sort', $value);
                    break;

                case 'publish':
                    $query->orderBy('publish', $value);
                    break;
            }
        }
        
        $articles = $query->get();

        return $articles;
    }

    public static function article($slug, $data = [])
    {
        $article = Article::where('status_uuid', '8d1fe36a-e119-41e4-a48f-ca6614cc0305') // publish status
            ->where('publish', '<' , now())
            ->where('lang_uuid', $data['langUuid'] ?? base_lang_uuid())
            ->where('slug', $slug)
            ->first();

        return $article;
    }
}
