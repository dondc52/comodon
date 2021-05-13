<?php

namespace App\Http\Controllers;

use App\Models\Footer_link;
use Illuminate\Http\Request;

class FooterLinksController extends Controller
{
    public function index(Request $request){
        $search = $request->get('search');
        $numPerPage = $request->get('numPerPage') !== null ? $request->get('numPerPage') : env('NUM_PER_PAGE') ;
        $result = Footer_link::where('link_name', 'like', "%$search%")->paginate($numPerPage);
        return view('backend.footer_link.index', ['footer_links' => $result, 'search' => $search, 'numPerPage' => $numPerPage,]);
    }

    public function create(){
        $result = Footer_link::where('parent_id', null)->get();
        return view('backend.footer_link.create', ['parent' => $result]);
    }

    public function store(Request $request){
        $request->validate([
            'link_name' => 'required',
        ]);
        Footer_link::create([
            'link_name' => $request->link_name,
            'link_content' => $request->link_content,
            'parent_id' => $request->parent_id != 0 ? $request->parent_id : null,
        ]);
        return redirect()->route('footer_link.index')->with('success', 'Footer_link created successfully');
    }

    public function edit($id){
        $result = Footer_link::find($id);
        $parent = Footer_link::where('parent_id', null)->get();
        return view('backend.footer_link.edit', ['result' => $result, 'parent' => $parent]);
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
