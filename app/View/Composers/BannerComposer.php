<?php

namespace App\View\Composers;

use App\Models\Banner;
use Illuminate\View\View;

class BannerComposer
{
    public function compose(View $view){
        $view->with([
            'bannerresult' => Banner::latest()->first(),
        ]);
    }
}