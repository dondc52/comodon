<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('search');
        $result = Game::where('name', 'like', "%{$search}%")
            ->paginate(env('NUM_PER_PAGE'));

        return view('backend.game.index', [
            'games' => $result,
            'search' => $search,
        ]);
    }

    public function create()
    {
        return view('backend.game.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'image' => ['required'],
        ]);
        $game = new Game;
        $game->name = $request->name;
        $game->description = $request->description;
        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        $game->image = $newImageName;

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
            'name' => ['required'],
            'description' => ['required'],
            'image' => ['required'],
        ]);
        $game = Game::find($id);
        $game->description = $request->description;
        $game->name = $request->name;
        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        $game->image = $newImageName;
        
        $game->save();
        return redirect()->route('game.index')->with('success', 'Game updated success!');
    }

    public function destroy($id)
    {
        $result = Game::find($id);
        if (!$result) {
            return redirect()->route('game.index')->with('error', 'Game cannot found!');
        }
        $result->delete();
        return redirect()->route('game.index')->with('success', 'Game delete success!');
    }
}
