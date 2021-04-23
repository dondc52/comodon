<?php

namespace App\View\Composers;

use App\Models\AboutUs;
use Illuminate\View\View;

class AboutUsComposer
{
    public function compose(View $view){
        $view->with([
            'result' => AboutUs::first(),
            'result1' => AboutUs::take(3)->orderBy('created_at', 'desc')->get(),
        ]);
    }
}