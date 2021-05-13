<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqsController extends Controller
{
    public function index(Request $request){
        $search = $request->get('search');
        $result = Faq::where('title', 'like', "%{$search}%")
            ->paginate(env('NUM_PER_PAGE'));
        return view('backend.faq.index', ['faqs' => $result, 'search' => $search]);
    }

    public function create(){
        return view('backend.faq.create');
    }

    public function store(Request $request){
        $status = $request->status !== null ? 1 : 0;
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        // return $status;
        Faq::create([
            'title' => $request->title,
            'content' => $request->content,
            'status' => $status,
        ]);
        return redirect()->route('faq.index')->with('success', 'Created successfully');
    }

    public function edit($id){
        $result = Faq::find($id);
        return view('backend.faq.edit', ['result' => $result]);
    }

    public function update(Request $request, $id){
        $status = $request->status !== null ? 1 : 0;
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $target = Faq::find($id);
        $target->title = $request->title;
        $target->content = $request->content;
        $target->status = $status;
        $target->save();
        return redirect()->route('faq.index')->with('success', 'Updated successfully');
    }

    public function destroy($id){
        $target = Faq::find($id);
        if (!$target) {
            return redirect()->route('faq.index')->with('error', 'Cannot found!');
        }
        $target->delete(); 
        return redirect()->route('faq.index')->with('success', 'Delete success!');
    }

}
