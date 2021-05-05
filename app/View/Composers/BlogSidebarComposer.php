<?php

namespace App\View\Composers;

use App\Models\Post;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BlogSidebarComposer
{
    public function compose(View $view){
        $view->with([
            'result1' => Post::take(3)->orderByDesc('view_number')->get(),
            'result2' => Category::All(),
            'result' => DB::select(DB::raw("select w.name, w.id, w.title, w.image, count(b.id) no_of_books
                    from users w join posts b on w.id = b.user_id
                    group by w.id
                    order by no_of_books desc
                    limit 1")
            ),
        ]);
    }
}