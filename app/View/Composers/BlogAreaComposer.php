<?php

namespace App\View\Composers;

use App\Models\Post;
use Illuminate\View\View;

class BlogAreaComposer
{
    public function compose(View $view){
        $view->with([
            'posts' => Post::take(3)->orderByDesc('created_at')->get(),
        ]);
    }
}