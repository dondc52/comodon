<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.about_us.index', ['about_us' => AboutUs::all()]);
    }

    public function create()
    {
        return view('backend.about_us.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:300'],
            'content' => ['required', 'max:1000'],
            'link' => ['required', 'max:200'],
        ]);
        $about_us = new AboutUs;
        $about_us->title = $request->title;
        $about_us->content = $request->content;
        $about_us->link = $request->link;
        if($request->image !== null){
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $about_us->image = $newImageName;
        }
        $about_us->save();
        return redirect()->route('about_us.index')->with('success', 'Info created successfully');
    }

    public function edit($id)
    {
        return view('backend.about_us.edit', ['about_us' => AboutUs::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:300'],
            'content' => ['required', 'max:1000'],
            'link' => ['required', 'max:200'],
        ]);
        $about_us = AboutUs::find($id);
        $about_us->content = $request->content;
        $about_us->title = $request->title;
        $about_us->link = $request->link;
        if($request->image !== null){
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $about_us->image = $newImageName;
        }
        $about_us->save();
        return redirect()->route('about_us.index')->with('success', 'Info updated success!');
    }

    public function destroy($id)
    {
        $about_us = AboutUs::find($id);
        if (!$about_us) {
            return redirect()->route('about_us.index')->with('error', 'Info cannot found!');
        }
        $about_us->delete();
        return redirect()->route('about_us.index')->with('success', 'Info delete success!');
    }
}
