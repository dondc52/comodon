<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\View\Composers\GameComposer;
use App\View\Composers\AboutUsComposer;
use App\View\Composers\GalleryComposer;
use App\View\Composers\CategoryComposer;

class ViewComposerProvider extends ServiceProvider
{
    /**
     * Register services.  ssss
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('frontend.layouts.upcoming_games_area', GameComposer::class);
        View::composer('frontend.layouts.about_us_area', AboutUsComposer::class);
        View::composer('frontend.layouts.recent_update_area', AboutUsComposer::class);
        View::composer('frontend.layouts.gallery_area', GalleryComposer::class);
        View::composer('frontend.blog', CategoryComposer::class);
    }
}
