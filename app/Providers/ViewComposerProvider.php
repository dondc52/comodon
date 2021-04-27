<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\View\Composers\GameComposer;
use App\View\Composers\AboutUsComposer;
use App\View\Composers\BannerComposer;
use App\View\Composers\GalleryComposer;
use App\View\Composers\CategoryComposer;
use App\View\Composers\BlogSidebarComposer;
use App\View\Composers\BlogAreaComposer;
use App\View\Composers\FaqComposer;
use App\View\Composers\PackageComposer;
use App\View\Composers\RattingComposer;

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
        View::composer('frontend.layouts.blog_right_sidebar', BlogSidebarComposer::class);
        View::composer('frontend.layouts.blog_area', BlogAreaComposer::class);
        View::composer('frontend.layouts.frequently_asked_questions', FaqComposer::class);
        View::composer('frontend.layouts.pricing_plans_area', PackageComposer::class);
        View::composer('frontend.layouts.testimonials_area', RattingComposer::class);
        View::composer('frontend.index', BannerComposer::class);
    }
}
