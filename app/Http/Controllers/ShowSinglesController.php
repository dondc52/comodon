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
        return view('frontend.single_blog', [
            'result3' => $result3,
            'result4' => $result4,
            'result5' => $result5,
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
