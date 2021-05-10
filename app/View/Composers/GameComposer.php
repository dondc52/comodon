<?php

namespace App\View\Composers;

use App\Models\Game;
use Illuminate\View\View;

class GameComposer
{
    public function compose(View $view){
        $view->with('games', Game::orderBy('created_at', 'desc')->get());
    }
}