<?php

namespace App\Providers;

use App\Models\Chapter;
use App\Models\Comic;
use App\Observers\ChapterObserver;
use App\Observers\ComicObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Comic::observe(ComicObserver::class);
        Chapter::observe(ChapterObserver::class);
        Blade::directive('routeIs', function ($expression) {
            return "<?php if(Request::url() == route($expression)): ?>";
        });
    }
}
