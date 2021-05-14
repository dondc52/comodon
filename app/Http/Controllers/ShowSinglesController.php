<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowSinglesController extends Controller
{  
    public function showPost($id)
    {
        $post = Post::find($id);
        $user = Post::find($id)->user;
        $category = Post::find($id)->cat;
        $next = Post::where('id', '>', $id)->where('cat_id', '=', $post->cat_id)->orderBy('id')->first();
        $prev = Post::where('id', '<', $id)->where('cat_id', '=', $post->cat_id)->orderByDesc('id')->first();

        $countCmt = Comment::where('post_id', $id)->count();

        $comments = Comment::join('users', 'users.id', '=', 'comments.user_id')
                        ->where('comments.post_id', $id)
                        ->where('comments.parent_id', 0)
                        ->select(['comments.*', 'users.name', 'users.image'])
                        ->with('children')->get();

        // return $comments;

        // return Comment::all()[0]->user->name;

        return view('frontend.single_blog', [
            'post' => $post,
            'user' => $user,
            'category' => $category,
            'next' => $next,
            'prev' => $prev,
            'comments' => $comments,
            'countCmt' => $countCmt,
        ]);
    }

    public function showAbout($id)
    {
        $result = AboutUs::find($id);
        return view('frontend.single_about', [
            'about' => $result,
        ]);
    }
}
