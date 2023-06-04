<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    public function index()
    {
        $customers = Customers::get();
        return view('admin.customer',compact('customers'));
    }

    public function change_status($id)
    {
       $customer_data = Customers::where('id',$id)->first();
       if($customer_data->status == 1)
       {
        $customer_data->status = 0;
       }
       else{
        $customer_data->status = 1;
       }
       $customer_data->update();
       return redirect()->back()->with('success','Update status customer successfully');
    }
}