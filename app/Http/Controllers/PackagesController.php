<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function index(Request $request){
        $search = $request->get('search');
        $result = Package::where('title', 'like', "%{$search}%")
            ->paginate(env('NUM_PER_PAGE'));
        return view('backend.package.index', [
            'packages' => $result,
            'search' => $search,
        ]);
    }

    public function create(){
        return view('backend.package.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description1' => 'required',
            'price' => 'required|numeric',
        ]);
        Package::create([
            'title' => $request->title,
            'description1' => $request->description1,
            'description2' => $request->description2,
            'description3' => $request->description3,
            'price' => $request->price,
            'status' => $request->status,
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
            'price' => 'numeric|required',
        ]);
        $target = Package::find($id);
        $target->title = $request->title;
        $target->description1 = $request->description1;
        $target->description2 = $request->description2;
        $target->description3 = $request->description3;
        $target->price = $request->price;
        $target->status = $request->status;
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
