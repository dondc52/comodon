<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class BlogsController extends Controller
{
    public function listpost(Request $request)
    {
        $cate = $request->get('cate');
        $auth = $request->get('auth');
        $search = $request->get('search');

        $whereClause = [];

        if($cate){
            $whereClause[] = ['categories.id', '=', $cate];
        }

        if($auth){
            $whereClause[] = ['users.id', '=', $auth];
        }

        if($search){
            $whereClause[] = ['posts.title', 'like', "%$search%"];
        }

        $result = Post::join('users', 'posts.user_id', '=', 'users.id')
                ->join('categories', 'posts.cat_id', '=', 'categories.id')
                ->where($whereClause)
                ->select(['posts.*', 'categories.cat_name', 'users.name'])
                ->paginate(env('NUM_PER_PAGE'));

        return view('frontend.blog', [
            'posts' => $result,
            'auth' => $auth,
            'search' => $search,
            'cate' => $cate,
        ]);
    }
}
