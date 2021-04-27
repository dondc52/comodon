<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function addFeedback(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'content' => 'required',
        ]);
        Mail::send(
            'mailfb', 
            array(
                'name'=>$request->get('name'),
                'email'=>$request->get('email'), 
                'content'=>$request->get('content'),
            ), function($message){
	            $message->to('dinhcongdonatbn@gmail.com', 'Visitor')->subject('Visitor Feedback!');
	    });

        return view('form')->with('success', 'Send message succecssfully!');
    }
}
