<?php

namespace App\View\Composers;

use App\Models\Post;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BlogSidebarComposer
{
    public function compose(View $view)
    {
        $result = DB::select(
            DB::raw("select w.name, w.id, w.title, w.image, count(b.id) num_post
                from users w join posts b on w.id = b.user_id
                group by w.id
                order by num_post desc
                limit 1")
        );

        $view->with([
            'posts' => Post::take(3)->orderByDesc('view_number')->get(),
            'categories' => Category::All(),
            'user' => $result[0],
        ]);
    }
}
