<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(){
        $result = Banner::find(7);
        return view('backend.banner.index', [
            'result' => $result,
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => ['required'],
            'content' => ['required'],
        ]);
        $target = Banner::find($id);
        $target->title = $request->title;
        $target->content = $request->content;
        $target->video_link = $request->video_link;
        if($request->image !== null){
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $target->image = $newImageName;
        }
        $target->save();
        return redirect()->back()->with('success', 'Banner updated successfully');
    }
}
