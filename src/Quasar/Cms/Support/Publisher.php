<?php namespace Quasar\Cms\Support;

use Quasar\Cms\Models\Article;
use Quasar\Cms\Models\Version;

class Publisher
{
    public static function articles($anchor, $data = [])
    {
        $version = self::checkVersion();

        $query = Article::whereHas('sections', function($q) use ($anchor) {
                $q->where('anchor', $anchor);
            })
            ->where('lang_uuid', $data['langUuid'] ?? base_lang_uuid());

        if ($version)
        {
            if ($version->hasCurrentContent)
            {
                $query->orWhere('version_uuid', $version->uuid);
            }
            else
            {
                $query->where('version_uuid', $version->uuid);
            }
        }

        // to limit publish articles check that hasn't version and has current content is false
        if (!$version || $version && $version->hasCurrentContent)
        {
            $query->where('status_uuid', '8d1fe36a-e119-41e4-a48f-ca6614cc0305') // publish status
                ->where('publish', '<' , now());
        }
        
        if ($data['categories'] ?? false)
        {
            if (is_array($data['categories']))
            {
                $query->whereHas('categories', function($q) use ($data) {
                    $q->whereIn('slug', $data['categories']);
                });
            }
        }    

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
        $version = self::checkVersion();

        $query = Article::where('lang_uuid', $data['langUuid'] ?? base_lang_uuid())
            ->where('slug', $slug);

        if ($version)
        {
            if ($version->hasCurrentContent)
            {
                $query->orWhere('version_uuid', $version->uuid);
            }
            else
            {
                $query->where('version_uuid', $version->uuid);
            }
        }

        // to limit publish articles check that hasn't version and has current content is false
        if (!$version || $version && $version->hasCurrentContent)
        {
            $query->where('status_uuid', '8d1fe36a-e119-41e4-a48f-ca6614cc0305') // publish status
                ->where('publish', '<' , now());
        }

        $article = $query->first();

        if (!$article) abort(404);

        return $article;
    }

    private static function checkVersion()
    {
        $version = null;
        if (request()->has('cmsVersion')) $version = Version::where('uuid', request()->input('cmsVersion'))->first();

        return $version;
    }
}
