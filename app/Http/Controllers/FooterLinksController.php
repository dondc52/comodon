<?php

namespace App\Http\Controllers;

use App\Models\Footer_link;
use Illuminate\Http\Request;

class FooterLinksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $result = Footer_link::paginate(5);
        return view('backend.footer_link.index', ['footer_links' => $result]);
    }

    public function create(){
        return view('backend.footer_link.create');
    }

    public function store(Request $request){
        $request->validate([
            'link_name' => 'required',
        ]);
        Footer_link::create([
            'link_name' => $request->link_name,
            'link_content' => $request->link_content,
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->route('footer_link.index')->with('success', 'Footer_link created successfully');
    }

    public function edit($id){
        $result = Footer_link::find($id);
        return view('backend.footer_link.edit', ['result' => $result]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'link_name' => 'required',
        ]);
        $target = Footer_link::find($id);
        $target->link_name = $request->link_name;
        $target->link_content = $request->link_content;
        $target->parent_id = $request->parent_id;
        $target->save();
        return redirect()->route('footer_link.index')->with('success', 'Footer_link updated successfully');
    }

    public function destroy($id){
        $target = Footer_link::find($id);
        if (!$target) {
            return redirect()->route('footer_link.index')->with('error', 'Footer_link cannot found!');
        }
        $target->delete(); 
        return redirect()->route('footer_link.index')->with('success', 'Footer_link delete success!');
    }
}
