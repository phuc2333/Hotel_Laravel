<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Customers;
class BookingController extends Controller
{
    public function cart_submit(Request $request)
    {
        
        $request->validate([
            'check_in' => ['required',  'after_or_equal:today'],
            'check_out' => ['required',  'after_or_equal:check_in'],
            'adust' => 'required',
            'children' => 'required',
        ]);

        session()->push('cart_room_id', $request->room_id);
        session()->push('cart_check_in', $request->check_in);
        session()->push('cart_check_out', $request->check_out);
        session()->push('cart_adult', $request->adult);
        session()->push('cart_children', $request->children);
        return redirect()->back()->with('success', 'Room is add to cart successfully');
    }

    public function cart_view()
    {
        // session()->forget('cart_room_id');
        // session()->forget('cart_check_in');
        // session()->forget('cart_check_out');
        // session()->forget('cart_adult');
        // session()->forget('cart_children');
        return view('front.cart');
    }

    public function cartdelete($id)
    {
        $arr_cart_room_id = array();
        $i = 0;
        $cart_room_id = session()->get('cart_room_id');
        
        foreach ($cart_room_id ?? [] as $value) {
            $arr_cart_room_id[$i] = $value;
            $i++;
        }
        
        $arr_cart_checkin_date = array();
        $i = 0;
        $cart_checkin_date = session()->get('cart_check_in');
        
        foreach ($cart_checkin_date ?? [] as $value) {
            $arr_cart_checkin_date[$i] = $value;
            $i++;
        }
        
        $arr_cart_checkout_date = array();
        $i = 0;
        $cart_checkout_date = session()->get('cart_check_out');
        
        foreach ($cart_checkout_date ?? [] as $value) {
            $arr_cart_checkout_date[$i] = $value;
            $i++;
        }
        
        $arr_cart_adult = array();
        $i = 0;
        $cart_adult = session()->get('cart_adult');
        
        foreach ($cart_adult ?? [] as $value) {
            $arr_cart_adult[$i] = $value;
            $i++;
        }
        
        $arr_cart_children = array();
        $i = 0;
        $cart_children = session()->get('cart_children');
        
        foreach ($cart_children ?? [] as $value) {
            $arr_cart_children[$i] = $value;
            $i++;
        }
        session()->forget('cart_room_id');
        session()->forget('cart_check_in');
        session()->forget('cart_check_out');
        session()->forget('cart_adult');
        session()->forget('cart_children');

        for($i = 0; $i<count($arr_cart_room_id);$i++) {
           if($arr_cart_room_id[$i] === $id)
           {
                continue;
           }
           else{
            session()->push('cart_room_id',  $arr_cart_room_id[$i]);
            session()->push('cart_check_in', $arr_cart_checkin_date[$i]);
            session()->push('cart_check_out', $arr_cart_checkout_date[$i]);
            session()->push('cart_adult', $arr_cart_adult[$i]);
            session()->push('cart_children', $arr_cart_children[$i]);
    
           }
        }                      
        return redirect()->back()->with('success','Cart item is deleted');
    }

    public function checkout()
    {
        if(!Auth::guard('customer')->check())
        {
        return redirect()->back()->with('error','You must have to login in order to checkout');
        }

        if(!session()->has('cart_room_id'))
        {
        return redirect()->back()->with('error','There is no item in the cart');
        }

        return view('front.checkout');
    }
}
