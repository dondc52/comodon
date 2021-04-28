<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $result = Faq::paginate(5);
        return view('backend.faq.index', ['faqs' => $result]);
    }

    public function create(){
        return view('backend.faq.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        Faq::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return redirect()->route('faq.index')->with('success', 'Faq created successfully');
    }

    public function edit($id){
        $result = Faq::find($id);
        return view('backend.faq.edit', ['result' => $result]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $target = Faq::find($id);
        $target->title = $request->title;
        $target->content = $request->content;
        $target->save();
        return redirect()->route('faq.index')->with('success', 'Faq updated successfully');
    }

    public function destroy($id){
        $target = Faq::find($id);
        if (!$target) {
            return redirect()->route('faq.index')->with('error', 'Faq cannot found!');
        }
        $target->delete(); 
        return redirect()->route('faq.index')->with('success', 'Faq delete success!');
    }

}
