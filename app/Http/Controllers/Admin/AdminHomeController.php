<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        $total_completed_orders = Order::where('status','Completed')->count();
        $total_pending_orders = Order::where('status','Pending')->count();
        $total_active_customers = Customers::where('status',1)->count();
        $total_pending_customers = Customers::where('status',0)->count();

        return view('admin.home',compact('total_completed_orders','total_pending_orders','total_active_customers','total_pending_customers'));
    }
}
