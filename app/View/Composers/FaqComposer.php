<?php

namespace App\View\Composers;

use App\Models\Faq;
use Illuminate\View\View;

class FaqComposer
{
    public function compose(View $view){
        $view->with([
            'faqs' => Faq::where('status', 1)->get(),
        ]);
    }
}