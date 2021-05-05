<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogsController extends Controller
{
    public function listpost(Request $request){
        $page = $request->get('page') !== null ? (int) $request->get('page') : 1;
        $cate = $request->get('cate');
        $numPerPage = env('NUM_PER_PAGE');
        
        if($cate == null){
            $result = Post::join('users', 'posts.user_id', '=', 'users.id')
                            ->join('categories', 'posts.cat_id', '=', 'categories.id')
                            ->limit($numPerPage)->offset(($page - 1)*$numPerPage)
                            ->get(['posts.*', 'categories.cat_name', 'users.name']);
            $totalItems = Post::count();
        }
        else{
            $result = Post::join('users', 'posts.user_id', '=', 'users.id')
                            ->join('categories', 'posts.cat_id', '=', 'categories.id')
                            ->where('categories.id', '=', $cate)
                            ->limit($numPerPage)->offset(($page - 1)*$numPerPage)
                            ->get(['posts.*', 'categories.cat_name', 'users.name']);
            $totalItems = Post::join('categories', 'posts.cat_id', '=', 'categories.id')
                            ->where('categories.id', '=', $cate)
                            ->count();
        }
        $totalPages = ceil($totalItems/$numPerPage);
        // $result = Post::limit($numPerPage)->offset(($page - 1)*$numPerPage)->get();
        return view('frontend.blog', [
            'result1' => $result,
            'totalPages' => $totalPages,
            'currentPage' => $page,
            'cateNumber' => $cate,
        ]);
    }
}
