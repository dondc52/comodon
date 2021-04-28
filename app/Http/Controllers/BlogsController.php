<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogsController extends Controller
{
    const NUM_PER_PAGE=10;
    public function listpost(Request $request){
        $page = $request->get('page') !== null ? (int) $request->get('page') : 1;
        $numPerPage = $request->get('numPerPage') !== null ? (int) $request->get('numPerPage') : self::NUM_PER_PAGE;
        $totalItems = Post::count();
        $totalPages = ceil($totalItems/$numPerPage);
        $result = Post::join('users', 'posts.user_id', '=', 'users.id')
                        ->join('categories', 'posts.cat_id', '=', 'categories.id')
                        ->limit($numPerPage)->offset(($page - 1)*$numPerPage)
                        ->get(['posts.*', 'categories.cat_name', 'users.name']);
        // $result = Post::limit($numPerPage)->offset(($page - 1)*$numPerPage)->get();
        return view('frontend.blog', [
            'result1' => $result,
            'totalPages' => $totalPages,
            'currentPage' => $page,
        ]);
    }
}
