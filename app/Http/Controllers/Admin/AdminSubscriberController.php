<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Mail\Websitemail;
class AdminSubscriberController extends Controller
{
    public function show()
    {
        $all_subscribers = Subscriber::where('status',1)->get();
        return view('admin.subscriber_show',compact('all_subscribers'));
    }

    public function send_email()
    {
        return view('admin.subscriber_send_email');
    }

    public function send_email_submit(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

           //send email
            $subject = $request->subject;
            $message = $request->message;
            $all_message = Subscriber::where('status',1)->get();
            foreach($all_message as $item)
            {
                \Mail::to($item->email)->send(new Websitemail($subject,$message));
            }
            return redirect()->back()->with('success','Email sent successfully');
    }
}
