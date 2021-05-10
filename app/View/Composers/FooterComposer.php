<?php

namespace App\View\Composers;

use App\Models\ContactInfor;
use App\Models\Footer_link;
use Illuminate\View\View;

class FooterComposer
{
    public function compose(View $view){
        $view->with([
            'footer_links' => Footer_link::whereNull('parent_id')->with('children')->get(),
            'footer_infor' => ContactInfor::find(1)->value('footer_infor'),
        ]);
    }
}