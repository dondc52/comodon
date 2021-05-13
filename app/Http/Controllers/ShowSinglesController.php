<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
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
        return view('frontend.single_blog', [
            'post' => $post,
            'user' => $user,
            'category' => $category,
            'next' => $next,
            'prev' => $prev,
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
