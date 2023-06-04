<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext as ApiContext;
use PayPal\Auth\OAuthTokenCredential as OAuthTokenCredential;
use PayPal\Api\Amount as Amount;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use App\Mail\Websitemail;
use App\Models\Admin;

class BookingController extends Controller
{
    public function cart_submit(Request $request)
    {

        $request->validate([
            'check_in' => ['required',  'after_or_equal:today'],
            'check_out' => ['required',  'after_or_equal:check_in'],
            'adult' => 'required',
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

        for ($i = 0; $i < count($arr_cart_room_id); $i++) {
            if ($arr_cart_room_id[$i] === $id) {
                continue;
            } else {
                session()->push('cart_room_id',  $arr_cart_room_id[$i]);
                session()->push('cart_check_in', $arr_cart_checkin_date[$i]);
                session()->push('cart_check_out', $arr_cart_checkout_date[$i]);
                session()->push('cart_adult', $arr_cart_adult[$i]);
                session()->push('cart_children', $arr_cart_children[$i]);
            }
        }
        return redirect()->back()->with('success', 'Cart item is deleted');
    }

    public function checkout()
    {

        if (!Auth::guard('customer')->check()) {
            return redirect()->back()->with('error', 'You must have to login in order to checkout');
        }

        if (!session()->has('cart_room_id')) {
            return redirect()->back()->with('error', 'There is no item in the cart');
        }

        return view('front.checkout');
    }

    public function payment(Request $request)
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->back()->with('error', 'You must have to login in order to checkout');
        }

        if (!session()->has('cart_room_id')) {
            return redirect()->back()->with('error', 'There is no item in the cart');
        }
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',

        ]);
        session()->put('name', $request->name);
        session()->put('email', $request->email);
        session()->put('phone', $request->phone);
        session()->put('address', $request->address);

        return view('front.payment');
    }

    public function paypal($final_price,Request $request)
    {
        $client = 'AXvgYZocdePq8LlpiXQqc15KIkxW9g7UH2yJqaLhySj5Y57Y_-E_BDntbWlm8KUdJAm_c9cwzUAv2I4R';
        $secret = 'EP7GBupJtbKayCH82Uqb9nrarmXeoFq-pqyx6oYsPc_OE2ImKcxSYtw7xAKQvIca0_muqlsPGfzCSEgR';
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                $client,
                $secret
            )
        );
        $paymentId = request('paymentId');
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));

        $transaction = new Transaction();
        $amount = new Amount();
        $details = new Details();

        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal($final_price);

        $amount->setCurrency('USD');
        $amount->setTotal($final_price);
        $amount->setDetails($details);
        $transaction->setAmount($amount);

        $execution->addTransaction($transaction);
        $result = $payment->execute($execution, $apiContext);


        if ($result->state == 'approved') {
            $paid_amount = $result->transactions[0]->amount->total;
            $order_no = time();
             
            // $statement = DB::select("SHOW TABLE STATUS LIKE 'orders'");

            // $ai_id = $statement[0]->Auto_increment;
            //  dd($ai_id);
            $obj = new Order();
            $obj->customer_id = Auth::guard('customer')->user()->id;
            $obj->order_no = $order_no;
            $obj->transaction_id = $result->id;
            $obj->payment_method = 'Paypal';
            $obj->paid_amount = $paid_amount;
            $obj->booking_date = date('d/m/y');
            $obj->status = 'Completed';
            $obj->save();
           // lay id tu bang order de gan gia trij cho order_id o bang order_detail
           $ai_id = DB::select("select max(id) as id from orders");
           $order_id = $ai_id[0]->id;
          
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
            $my_Room_order = 0;
            
            for ($i = 0; $i < count($arr_cart_room_id); $i++) {
                $room_data = DB::table('rooms')->where('id', $arr_cart_room_id[$i])->first();
                $date1 = $cart_checkin_date[$i];
                $date2 = $cart_checkout_date[$i];
                $diff = strtotime($date2) - strtotime($date1);
                $days = $diff / (60 * 60 * 24);
                $total_price = $days * $room_data->price;


                $obj = new OrderDetail();

                $obj->order_id = $order_id;

                $obj->room_id = $arr_cart_room_id[$i];

                $obj->order_no = $order_no;

                $obj->checkin_date = $arr_cart_checkin_date[$i];

                $obj->checkout_date = $arr_cart_checkout_date[$i];

                $obj->adult = $arr_cart_adult[$i];

                $obj->children = $arr_cart_children[$i];

                $obj->subtotal = $total_price;

                $obj->save();
            }
                //send email
                $subject = 'New Order';
                $message = 'You have an order for hotel booking.The booking information is given below:<br> <br>';
                $message .= '<br>Order No:' . $order_no;
                $message .= '<br>Transaction Id:' . $result->id;
                $message .= '<br>Payment Method:PayPal';
                $message .= '<br>Paid Amount:' . $paid_amount;
                $message .= '<br>Booking date:' . date('d/m/Y').'<br>';

                for ($i = 0; $i < count($arr_cart_room_id); $i++) {
                    $r_info = DB::table('rooms')->where('id', $arr_cart_room_id[$i])->first();
                $message .= '<br>Room name:' . $r_info->name;
                $message .= '<br>Price Per Night:' . $r_info->price;
                $message .= '<br>Checkin Date:' . $arr_cart_checkin_date[$i];
                $message .= '<br>Checkout Date:' . $arr_cart_checkout_date[$i];
                $message .= '<br>Children:' . $arr_cart_children[$i];
                $message .= '<br>Adult:' . $arr_cart_adult[$i] .'<br>';

                }
                $customer_email = Auth::guard('customer')->user()->email;
                
                \Mail::to($customer_email)->send(new Websitemail($subject, $message));

                session()->forget('cart_room_id');
                session()->forget('cart_check_in');
                session()->forget('cart_check_out');
                session()->forget('cart_adult');
                session()->forget('cart_children');

                session()->forget('name', $request->name);
                session()->forget('email', $request->email);
                session()->forget('phone', $request->phone);
                session()->forget('address', $request->address);

            return redirect()->route('home')->with('successPayment', 'Payment is successfully');
        } else {
            return redirect()->back()->with('error', 'Payment is not successfully');
        }
    }
}
