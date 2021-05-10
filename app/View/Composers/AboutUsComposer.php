<?php

namespace App\View\Composers;

use App\Models\AboutUs;
use Illuminate\View\View;

class AboutUsComposer
{
    public function compose(View $view){
        $view->with([
            'result' => AboutUs::where('status', 1)->orderByDesc('created_at')->first(),
            'result1' => AboutUs::orderBy('created_at', 'desc')->get(),
        ]);
    }
}