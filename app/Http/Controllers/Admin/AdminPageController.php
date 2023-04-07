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
}
