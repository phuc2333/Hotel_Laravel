<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use Auth;
use Hash;
class CustomerEditProfileController extends Controller
{
    public function index()
    {
        return view('customer.profile');
    }
    
    public function profile_submit(Request $request)
    {
        $customer_data = Customers::where('email',Auth::guard('customer')->user()->email)->first();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            // 'password' => 'min:6|required_with:retype_password|same:retype_password',
            // 'retype_password' => 'min:6'
        ]);

        if($request->password != ''){
            $request->validate([
               'password' => 'min:6|required_with:retype_password|same:retype_password',
                'retype_password' => 'min:6'
            ]);
            $customer_data->password = Hash::make($request->password);
        }
       if($request->hasFile('photo'))
       {
        $request->validate([
            'photo' => 'required|mimes:jpg,jped,png,gif'
        ]);
        // xoa anh trong file upload => anh o day la anh hien tai => xoa di de update anh moi
        unlink(public_path('upload/'.$customer_data->photo));
        // Lay duoi file anh co the la jpg,png....
        $ext = $request->file('photo')->extension();
        // dat ten file: admin.jpg...
        $final_name = 'admin'. '.' . $ext;
       // cap nhat anh vao file upload trong public/upload cua laravel
       // Moves the file to a new location
        $request->file('photo')->move(public_path('upload/'),$final_name);
        // cap nhat ten anh vao database
        $customer_data->photo = $final_name;
        }
        $customer_data->name = $request->name;
        $customer_data->email = $request->email;
        $customer_data->update();
        return redirect()->back()->with('success','Profile information is saved successfully');
    }
}
