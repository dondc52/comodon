<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $result = Package::paginate(5);
        return view('backend.package.index', ['packages' => $result]);
    }

    public function create(){
        return view('backend.package.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description1' => 'required',
            'description2' => 'required',
            'description3' => 'required',
            'price' => 'numeric',
        ]);
        Package::create([
            'title' => $request->title,
            'description1' => $request->description1,
            'description2' => $request->description2,
            'description3' => $request->description3,
            'price' => $request->price,
        ]);
        return redirect()->route('package.index')->with('success', 'package created successfully');
    }

    public function edit($id){
        $result = Package::find($id);
        return view('backend.package.edit', ['result' => $result]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'description1' => 'required',
            'description2' => 'required',
            'description3' => 'required',
            'price' => 'numeric',
        ]);
        $target = Package::find($id);
        $target->title = $request->title;
        $target->description1 = $request->description1;
        $target->description2 = $request->description2;
        $target->description3 = $request->description3;
        $target->price = $request->price;
        $target->save();
        return redirect()->route('package.index')->with('success', 'package updated successfully');
    }

    public function destroy($id){
        $target = Package::find($id);
        if (!$target) {
            return redirect()->route('package.index')->with('error', 'package cannot found!');
        }
        $target->delete(); 
        return redirect()->route('package.index')->with('success', 'package delete success!');
    }
}
