<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Customers;
use App\Models\Order;
use App\Models\OrderDetail;
use PDF;
class CustomerOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('customer_id',Auth::guard('customer')->user()->id)->get();
        return view('customer.order',compact('orders'));
    }

    public function invoice($id)
    {
        $order = Order::where('id',$id)->first();
        $order_detail = OrderDetail::where('order_id',$id)->get();
        return view('customer.invoice',compact('order','order_detail'));
    }
}
