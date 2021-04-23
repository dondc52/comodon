<?php

namespace App\View\Composers;

use App\Models\Gallery;
use Illuminate\View\View;

class GalleryComposer
{
    public function compose(View $view){
        $view->with([
            'result' => Gallery::take(2)->orderBy('created_at', 'desc')->get(),
            'result1' => Gallery::take(1)->orderBy('created_at', 'desc')->skip(2)->get(),
            'result2' => Gallery::take(1)->orderBy('created_at', 'desc')->skip(3)->get(),
        ]);
    }
}