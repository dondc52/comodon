<?php

namespace App\View\Composers;

use App\Models\Gallery;
use Illuminate\View\View;

class GalleryComposer
{
    public function compose(View $view){
        $view->with([
            'galleries' => Gallery::take(9)->orderByDesc('created_at')->get(),
        ]);
    }
}