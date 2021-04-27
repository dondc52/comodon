<?php

namespace App\View\Composers;

use App\Models\Faq;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FaqComposer
{
    public function compose(View $view){
        $view->with([
            'faqresult' => Faq::take(6)->orderBy('created_at', 'desc')->get(),
        ]);
    }
}