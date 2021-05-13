<?php

namespace App\View\Composers;

use App\Models\Package;
use Illuminate\View\View;

class PackageComposer
{
    public function compose(View $view){
        $view->with([
            'packages' => Package::where('status', 1)->orderBy('created_at', 'desc')->get(),
        ]);
    }
}