<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorsController extends Controller
{
    public function __construct()
    {   
        $this->middleware('auth');
    }

    public function index()
    {
        $result = Author::all();
        return view('backend.author.index', ['result' => $result]);
    }

    public function create() {
        return view('backend.author.create');
    }

    public function store(Request $request){
        $request->validate([
            'author_name' => ['required', 'max:50'],
            'title' => ['required', 'max:200'],
            'subtitle' => ['required', 'max:1000'],
        ]);
        $result = new Author;
        $result->author_name = $request->author_name;
        $result->title = $request->title;
        $result->subtitle = $request->subtitle;
        if($request->image !== null){
            $newImageName = time() . '-' . $request->author_name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $result->image = $newImageName;
        }
        $result->save();
        return redirect()->route('author.index')->with('success', 'Author created successfully');
    }

    public function edit($id){
        $result = Author::find($id);
        return view('backend.author.edit', ['result' => $result]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => ['required', 'max:50'],
            'title' => ['required', 'max:200'],
            'subtitle' => ['required', 'max:1000'],
        ]);
        $target = Author::find($id);
        $target->author_name = $request->name;
        $target->title = $request->title;
        $target->subtitle = $request->subtitle;
        if($request->image !== null){
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $target->image = $newImageName;
        }
        $target->save();
        return redirect()->route('author.index')->with('success', 'Author updated successfully');
    }

    public function destroy($id) {
        $target = Author::find($id);
        if (!$target) {
            return redirect()->route('author.index')->with('error', 'Author cannot found!');
        }
        $target->delete(); 
        return redirect()->route('author.index')->with('success', 'Author delete success!');
    }
}
