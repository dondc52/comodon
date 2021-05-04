<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\ContactInfor;

class ContactController extends Controller
{
    public function sendEmailContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email:rfc,dns',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        Mail::to('dinhcongdonatbn@gmail.com')->send(new ContactMail($details));
        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }

    public function index(){
        $contactInfor = ContactInfor::find(1);
        return view('backend.contact_infor', [
            'contactInfor' => $contactInfor,
        ]);
    }
    public function update(Request $request){
        // echo $request->phone;
        // echo $request->phone_des;
        // echo $request->address;
        // echo $request->address_des;
        // echo $request->email;
        // echo $request->email_des;

        $request->validate([
            'address' => 'required',
            'address_des' => 'required',
            'phone' => 'required',
            'phone_des' => 'required',
            'email' => 'required',
            'email_des' => 'required',
        ]);
        $target = ContactInfor::find(1);
        $target->contact_address = $request->address;
        $target->contact_address_des = $request->address_des;
        $target->contact_phone = $request->phone;
        $target->contact_phone_des = $request->phone_des;
        $target->contact_email = $request->email;
        $target->contact_email_des = $request->email_des;
        $target->save();
        return redirect()->route('contact_infor.index')->with('success', 'Category updated successfully');
    }
}
