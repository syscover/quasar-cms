<?php namespace Quasar\Cms\Events;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Quasar\Cms\Events\ArticleCreated;
use Quasar\Cms\Listeners\ArticleCreatedListener;

class CmsEventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ArticleCreated::class => [
            ArticleCreatedListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
