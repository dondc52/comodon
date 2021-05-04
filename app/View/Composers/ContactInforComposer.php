<?php

namespace App\View\Composers;

use App\Models\ContactInfor;
use Illuminate\View\View;

class ContactInforComposer
{
    public function compose(View $view){
        $view->with([
            'contactInfor' => ContactInfor::find(1),
        ]);
    }
}