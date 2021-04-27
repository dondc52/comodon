<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $result = Banner::all();
        return view('backend.banner.index', ['result' => $result]);
        // echo count($result->posts);
    }

    public function create(){
        return view('backend.banner.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => ['required', 'max:50'],
            'content' => ['required', 'max:1000'],
        ]);
        $result = new Banner;
        $result->title = $request->title;
        $result->content = $request->content;
        $result->video_link = $request->video_link;
        if($request->image !== null){
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $result->image = $newImageName;
        }
        $result->save();
        return redirect()->route('banner.index')->with('success', 'Banner created successfully');
    }

    public function edit($id){
        $result = Banner::find($id);
        return view('backend.banner.edit', ['result' => $result]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => ['required', 'max:50'],
            'content' => ['required', 'max:1000'],
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
        return redirect()->route('banner.index')->with('success', 'Banner updated successfully');
    }

    public function destroy($id){
        $target = Banner::find($id);
        if (!$target) {
            return redirect()->route('banner.index')->with('error', 'Banner cannot found!');
        }
        $target->delete(); 
        return redirect()->route('banner.index')->with('success', 'Banner delete success!');
    }
}
