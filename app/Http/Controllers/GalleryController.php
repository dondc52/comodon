<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    protected $gallery;
    public function __construct(Gallery $gallery)
    {
        $this->gallery = $gallery;
        $this->middleware('auth');
    }
    public function index(){
        $result = $this->gallery->showAllGallery();
        return view('backend.gallery.index', ['result' => $result]);
    }
    public function store(Request $request){
        $request->validate([
            'image' => 'required',
        ]);
        $result = new Gallery;
        if($request->image !== null){
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $result->image = $newImageName;
            $result->save();
            return redirect()->route('gallery.index')->with('success', 'Add image successfully');
        }
        else {
            return redirect()->route('gallery.index')->with('error', 'Image cannot found!');
        }
        
    }
    public function destroy($id){
        $target = Gallery::find($id);
        if (!$target) {
            return redirect()->route('gallery.index')->with('error', 'Image cannot found!');
        }
        $target->delete();
        return redirect()->route('gallery.index')->with('success', 'Image delete success!');
    }
}
