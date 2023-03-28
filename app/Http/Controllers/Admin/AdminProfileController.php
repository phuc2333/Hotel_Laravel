<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Auth;
class AdminProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }
    
    public function profile_submit(Request $request)
    {
        $admin_data = Admin::where('email',Auth::guard('admin')->user()->email)->first();
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
            $admin_data->password = Hash::make($request->password);
        }
       if($request->hasFile('photo'))
       {
        $request->validate([
            'photo' => 'required|mimes:jpg,jped,png,gif'
        ]);
        // xoa anh trong file upload => anh o day la anh hien tai => xoa di de update anh moi
        unlink(public_path('upload/'.$admin_data->photo));
        // Lay duoi file anh co the la jpg,png....
        $ext = $request->file('photo')->extension();
        // dat ten file: admin.jpg...
        $final_name = 'admin'. '.' . $ext;
       // cap nhat anh vao file upload trong public/upload cua laravel
       // Moves the file to a new location
        $request->file('photo')->move(public_path('upload/'),$final_name);
        // cap nhat ten anh vao database
        $admin_data->photo = $final_name;
        }
        $admin_data->name = $request->name;
        $admin_data->email = $request->email;
        $admin_data->update();
        return redirect()->back()->with('success','Profile information is saved successfully');
    }
}
