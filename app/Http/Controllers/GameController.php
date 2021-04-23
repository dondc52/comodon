<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.game.index', ['games' => Game::all()]);
    }

    public function create()
    {
        return view('backend.game.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'description' => ['required', 'max:1000'],
        ]);
        $game = new Game;
        $game->name = $request->name;
        $game->description = $request->description;
        if($request->image !== null){
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $game->image = $newImageName;
        }
        $game->save();
        return redirect()->route('game.index')->with('success', 'Game created successfully');
    }

    public function edit($id)
    {
        return view('backend.game.edit', ['game' => Game::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'description' => ['required', 'max:1000'],
        ]);
        $game = Game::find($id);
        $game->description = $request->description;
        $game->name = $request->name;
        if($request->image !== null){
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $game->image = $newImageName;
        }
        $game->save();
        return redirect()->route('game.index')->with('success', 'Game updated success!');
    }

    public function destroy($id)
    {
        $game = Game::find($id);
        if (!$game) {
            return redirect()->route('game.index')->with('error', 'Game cannot found!');
        }
        $game->delete();
        return redirect()->route('game.index')->with('success', 'Game delete success!');
    }
}