<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function sendEmailContact(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        Mail::to('dinhcongdonatbn@gmail.com')->send(new ContactMail($details));
        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }

    public function sendEmail(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        Mail::to('dinhcongdonatbn@gmail.com')->send(new ContactMail($details));
        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }
}
