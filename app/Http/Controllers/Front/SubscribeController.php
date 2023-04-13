<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\Websitemail;
use App\Models\Subscriber;
use Illuminate\Http\Request;


class SubscribeController extends Controller
{
    public function send_email(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'email' => 'required|email'
        ]);

        if(!$validator->passes())
        {
            return response()->json(['code' => 0, 'error_message' => $validator->errors()->toArray()]);
        }else{
            $token = hash('sha256',time());

            $obj = new Subscriber();
            $obj->email = $request->email;
            $obj->token = $token;
            $obj->status = 0;
            $obj->save();
            $verification_link = url('/subscriber/verify/'.$request->email.'/'.$token);
            //send email
            $subject = 'Subscribe verification';
            $message = 'Please click on the link below to confirm subscription <br>';
            $message .= '<a href="'.$verification_link.'">';
            $message .= $verification_link;
            $message .= '</a>';

            \Mail::to($request->email)->send(new Websitemail($subject,$message));
            return response()->json([
                'code' => 1,
                'success_message' => 'please check your email to confirm subscription'
            ]);
        }
    }

    public function verify($email,$token)
    {
        $subscriber_data = Subscriber::where('email',$email)->where('token',$token)->first();

        if($subscriber_data){
          //  dd(1);
            $subscriber_data->token = '';
            $subscriber_data->status = 1;
            $subscriber_data->update();

            return redirect()->route('home')->with('success','your subscription is vertify successfully');
        }
        else{
            return redirect()->route('home')->with('error','your subscription is not vertify successfully');
        }
    }
}