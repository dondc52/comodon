<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class EmailController extends Controller
{
    public $title = 'abc';
    public function sendEmail()
    {
      Mail::to('dinhcongdonatbn@gmail.com')->send(new MailNotify());
      return 'okok';
    }
}
