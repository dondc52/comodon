<?php

namespace App\View\Composers;

use App\Models\Ratting;
use Illuminate\View\View;

class RattingComposer
{
    public function compose(View $view){
        $view->with([
            'rattingresult' => Ratting::all(),
        ]);
    }
}