<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'content' => 'required',
        ]);
        $parent = $request->parent_id !== null ? $request->parent_id : 0;
        Comment::create([
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
            'parent_id' => $parent,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('successComment', 'Comment successfully');
    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }
}
