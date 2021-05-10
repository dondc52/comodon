<?php

namespace App\Http\Controllers;

use App\Models\Ratting;
use Illuminate\Http\Request;

class RattingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $search = $request->get('search');
        $result = Ratting::where('user_name', 'like', "%$search%")
                    ->paginate(env('NUM_PER_PAGE'));
        return view('backend.ratting.index', [
            'rattings' => $result,
            'search' => $search,
            ]);
    }

    public function create(){
        return view('backend.ratting.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'star_number' => ['numeric', 'required'],
            'score' => ['numeric', 'required'],
        ]);
        Ratting::create([
            'user_name' => $request->name,
            'content' => $request->content,
            'star_number' => $request->star_number,
            'score' => $request->score,
        ]);
        return redirect()->route('ratting.index')->with('success', 'Ratting created successfully');
    }

    public function edit($id){
        $result = Ratting::find($id);
        return view('backend.ratting.edit', ['result' => $result]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'star_number' => ['numeric', 'required'],
            'score' => ['numeric', 'required'],
        ]);
        $target = Ratting::find($id);
        $target->user_name = $request->name;
        $target->content = $request->content;
        $target->star_number = $request->star_number;
        $target->score = $request->score;
        $target->save();
        return redirect()->route('ratting.index')->with('success', 'Ratting updated successfully');
    }

    public function destroy($id){
        $target = Ratting::find($id);
        if (!$target) {
            return redirect()->route('ratting.index')->with('error', 'Ratting cannot found!');
        }
        $target->delete(); 
        return redirect()->route('ratting.index')->with('success', 'ratting delete success!');
    }
}
