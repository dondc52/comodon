<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $result = Category::all();
        return view('backend.category.index', ['result' => $result]);
    }
    public function create(){
        return view('backend.category.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'max:50'],
            'description' => ['required', 'max:1000'],
        ]);
        $result = new Category;
        $result->cat_name = $request->name;
        $result->description = $request->description;
        if($request->image !== null){
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $result->image = $newImageName;
        }
        $result->save();
        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }
    public function edit($id){
        $result = Category::find($id);
        return view('backend.category.edit', ['result' => $result]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => ['required', 'max:50'],
            'description' => ['required', 'max:1000'],
        ]);
        $target = Category::find($id);
        $target->cat_name = $request->name;
        $target->description = $request->description;
        if($request->image !== null){
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $target->image = $newImageName;
        }
        $target->save();
        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }
    public function destroy($id){
        $target = Category::find($id);
        if (!$target) {
            return redirect()->route('category.index')->with('error', 'Category cannot found!');
        }
        $target->delete(); 
        return redirect()->route('category.index')->with('success', 'Category delete success!');
    }
}
