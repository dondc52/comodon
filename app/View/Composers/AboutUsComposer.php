<?php

namespace App\View\Composers;

use App\Models\AboutUs;
use Illuminate\View\View;

class AboutUsComposer
{
    public function compose(View $view){
        $view->with([
            'result' => AboutUs::where('status', 1)->orderByDesc('created_at')->first(),
            'result1' => AboutUs::take(3)->orderByDesc('created_at')->get(),
        ]);
    }
}