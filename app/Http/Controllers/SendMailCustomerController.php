<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMailToCustomer;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;
use App\Models\Post;

class SendMailCustomerController extends Controller
{
    public function sendEmailToCustom(){
        $email_customer = Customer::pluck('email');

        $details = [
            'subject' => 'New post',
            'title' => 'Updating...',
            'description' => 'Updating...',
            'link' => '',
        ];
        
        $results = Post::where('status', 2)->get();

        if ($results->count() > 0) {
            foreach ($results as $row) {
                $details['title'] = $row->title;
                $details['description'] = $row->description;
                $details['link'] = 'http://localhost:8000/post/'.$row->id.'/show';

                Mail::to($email_customer)->send(new SendMailToCustomer($details));

                $row->status = 1;
                $row->save();
            }
        }

        echo 'ok';

        
        // return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }

}
