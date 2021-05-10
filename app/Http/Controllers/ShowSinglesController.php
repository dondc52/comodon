<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowSinglesController extends Controller
{  
    public function showPost($id)
    {
        $result3 = Post::find($id);
        $result4 = Post::find($id)->user;
        $result5 = Post::find($id)->cat;
        $next = Post::where('id', '>', $id)->where('cat_id', '=', $result3->cat_id)->orderBy('id')->first();
        $prev = Post::where('id', '<', $id)->where('cat_id', '=', $result3->cat_id)->orderByDesc('id')->first();
        return view('frontend.single_blog', [
            'result3' => $result3,
            'result4' => $result4,
            'result5' => $result5,
            'next' => $next,
            'prev' => $prev,
        ]);
    }

    public function showAbout($id)
    {
        $result3 = AboutUs::find($id);
        return view('frontend.single_about', [
            'result3' => $result3,
        ]);
    }
}
