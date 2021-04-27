<?php

namespace App\View\Composers;

use App\Models\Author;
use App\Models\Post;
use Illuminate\View\View;
use App\Models\Category;

class BlogSidebarComposer
{
    public function compose(View $view){
        $view->with([
            'result' => Author::take(1)->orderByDesc('created_at')->get(),
            'result1' => Post::take(3)->orderByDesc('view_number')->get(),
            'result2' => Category::All(),
        ]);
    }
}