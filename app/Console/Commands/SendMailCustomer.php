<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailToCustomer;
use App\Models\Post;

class SendMailCustomer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail to customer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email_customer = Customer::pluck('email');

        $details = [];
        
        $results = Post::where('status', 0)->get();

        if ($results->count() > 0) {
            foreach ($results as $row) {
                $details['title'] = '[Comodo Game] New Post: ' . $row->title;
                $details['description'] = $row->description;
                $details['content'] = $row->content;
                $details['link'] = env('APP_URL').'post/'.$row->id.'/show';

                Mail::to($email_customer)->send(new SendMailToCustomer($details));

                $row->status = 1;
                $row->save();
            }
        }
    }
}
