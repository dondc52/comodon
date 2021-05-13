<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategoryComposer
{
    public function compose(View $view){
        $view->with([
            'categories' => Category::where('status', 1)->orderBy('created_at', 'desc')->get(),
        ]);
    }
}