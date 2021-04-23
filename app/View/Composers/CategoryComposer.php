<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategoryComposer
{
    public function compose(View $view){
        $result1 = DB::table('posts')
                        ->join('categories', 'posts.cat_id', '=', 'categories.id')
                        ->join('users', 'posts.user_id', '=', 'users.id')
                        ->select('posts.*', 'categories.cat_name', 'users.name')
                        ->paginate(1);
        $view->with([
            'result' => Category::take(3)->orderBy('created_at', 'desc')->get(),
            'result1' => $result1,
        ]);
    }
}