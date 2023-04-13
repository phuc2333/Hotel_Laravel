<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function about()
    {
        $page_data = Page::where('id',1)->first();
        return view('admin.page_about',compact('page_data'));
    }

    public function about_update(Request $request)
    {
        $obj = Page::where('id',1)->first();
        $obj->about_heading = $request->about_heading;
        $obj->about_content = $request->about_content;
        $obj->about_status = $request->about_status;
        $obj->update();
        return redirect()->back()->with('success','Data is updated successfully');
    }

    public function cart()
    {
        $page_data = Page::where('id',1)->first();
        return view('admin.page_cart',compact('page_data'));
    }

    public function cart_update(Request $request)
    {
        $obj = Page::where('id',1)->first();
        $obj->cart_heading = $request->cart_heading;
        $obj->cart_status = $request->cart_status;
        $obj->update();
        return redirect()->back()->with('success','Data is updated successfully');
    }

    public function checkout()
    {
        $page_data = Page::where('id',1)->first();
        return view('admin.page_checkout',compact('page_data'));
    }

    public function checkout_update(Request $request)
    {
        $obj = Page::where('id',1)->first();
        $obj->checkout_heading = $request->checkout_heading;
        $obj->checkout_status = $request->checkout_status;
        $obj->update();
        return redirect()->back()->with('success','Data is updated successfully');
    }

    public function payment()
    {
        $page_data = Page::where('id',1)->first();
        return view('admin.page_payment',compact('page_data'));
    }

    public function payment_update(Request $request)
    {
        $obj = Page::where('id',1)->first();
        $obj->payment_heading = $request->payment_heading;
        $obj->update();
        return redirect()->back()->with('success','Data is updated successfully');
    }

    public function signin()
    {
        $page_data = Page::where('id',1)->first();
        return view('admin.page_signin',compact('page_data'));
    }

    public function signin_update(Request $request)
    {
        $obj = Page::where('id',1)->first();
        $obj->signin_heading = $request->signin_heading;
        $obj->signin_status = $request->signin_status;
        $obj->update();
        return redirect()->back()->with('success','Data is updated successfully');
    }

    public function signup()
    {
        $page_data = Page::where('id',1)->first();
        return view('admin.page_signup',compact('page_data'));
    }

    public function signup_update(Request $request)
    {
        $obj = Page::where('id',1)->first();
        $obj->signup_heading = $request->signup_heading;
        $obj->signup_status = $request->signup_status;
        $obj->update();
        return redirect()->back()->with('success','Data is updated successfully');
    }
}
