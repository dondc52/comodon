<?php

namespace App\View\Composers;

use App\Models\Footer_link;
use Illuminate\View\View;

class FooterComposer
{
    public function compose(View $view){
        $view->with('footer_links', Footer_link::whereNull('parent_id')->take(4)->with('children')->get());
    }
}