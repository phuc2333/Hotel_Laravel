<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Mail\Websitemail;
use App\Models\Customers;
use Mail;
class CustomerAuthController extends Controller
{
    public function login(){
        return view('customer.layout.login');
    }
    public function signup(){
        return view('customer.layout.signup');
    }
    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credential =  [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('customer')->attempt($credential)) {
            return redirect()->route('customer_home');
        } else {
            return redirect()->route('customer_login')->with('error', 'Information is not correct');
        }
    }

    public function signup_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:customers',
            'fullname' => 'required',
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);
        $token = hash('sha256',time());
        $password = Hash::make($request->password);
        $verification_link = url('signup-verify/'.$request->email.'/'.$token);

        $obj = new Customers();
        $obj->name = $request->fullname;
        $obj->email = $request->email;
        $obj->password = $password;
        $obj->token = $token;
        $obj->status = 0;
        $obj->save();

          //send email
          $subject = 'Signup verification';
          $message = 'Please click on the link below to confirm signup <br>';
          $message .= '<a href="'.$verification_link.'">';
          $message .= $verification_link;
          $message .= '</a>';
      \Mail::to($request->email)->send(new Websitemail($subject,$message));
        return redirect()->back()->with('success', 'To complete the signup,please check your email and click on the link');
    }

    public function signup_verify($email,$token)
    {
       
        $subscriber_data = Customers::where('email',$email)->where('token',$token)->first();

        if($subscriber_data){
            $subscriber_data->token = '';
            $subscriber_data->status = 1;
            $subscriber_data->update();

            return redirect()->route('customer_login')->with('success','your acccount is vertify successfully');
        }
        else{
            return redirect()->route('customer_login')->with('error','your account is not vertify successfully');
        }
    }
    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer_login');
    }

    public function forget_password()
    {
        return view('customer.forget_password');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        // get info customer from email
        $admin_data = Customers::where('email', $request->email)->first();
        // check query have data or not data
        if (!$admin_data) {
            return redirect()->back()->with('error', 'Email address not found');
        }
        // check have data => update token
        $token = hash('sha256', time());
        $admin_data->token = $token;
        $admin_data->update();
        // write info email reset passsword
        $reset_link = url('reset-password/' . $token . '/' . $request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the following link <br>';
        $message .= ' <a href="' . $reset_link . '">Click here</a>';

        Mail::to($request->email)->send(new Websitemail($subject, $message));
        return redirect()->route('customer_login')->with('success', 'Please check your email and follow the steps there');
    }

    public function reset_password($token, $email)
    {
        $customer_data = Customers::where('token', $token)->where('email', $email)->first();
        if (!$customer_data) {
            return redirect()->route('customer_login');
        }
        return view('customer.reset_password', compact('token', 'email'));
    }

    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'min:6|required_with:retype_password|same:retype_password',
            'retype_password' => 'min:6'
        ]);

        $customer_data = Customers::where('token', $request->token)->where('email', $request->email)->first();
        $customer_data->password = Hash::make($request->password);
        $customer_data->token = '';
        $customer_data->update();

        return redirect()->route('customer_login')->with('success', 'Password is reset successfully ');
    }
}
