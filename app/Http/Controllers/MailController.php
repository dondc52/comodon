<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail()
    {
        $details = [
            'title' => 'Mail from surfside Media',
            'body' => 'This is for testing mail using gmail1',
        ];

        Mail::to("dinhcongdonatbn@gmail.com")->send(new TestMail($details));
        return 'Email sent';
    }
}
