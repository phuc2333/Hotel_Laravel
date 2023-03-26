<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class AdminFeatureController extends Controller
{
    public function index()
    {
        $features = Feature::get();
        return view('admin.feature_view',compact('features'));
    }   
    
    public function add()
    {
       // return view('admin.layout.slide_add');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'photo' => 'required|mimes:jpg,jped,png,gif'
        // ]);
        // Lay duoi file anh co the la jpg,png....
        //$ext = $request->file('photo')->extension();
        // dat ten file: admin.jpg...
        //$final_name = time() . '.' . $ext;
        // cap nhat anh vao file upload trong public/upload cua laravel
        // Moves the file to a new location
      //  $request->file('photo')->move(public_path('upload/'), $final_name);

        // $obj = new Slide();
        // $obj->photo = $final_name;
        // $obj->heading = $request->heading;
        // $obj->text = $request->text;
        // $obj->button_text = $request->button_text;
        // $obj->button_url = $request->button_url;
        // $obj->save();

        //return redirect()->back()->with('success', 'Slider information is added successlly');
    }

    public function edit($id)
    {
        // $slide_data = Slide::where('id', $id)->first();
        // return view('admin.slide_edit', compact('slide_data'));
    }

    public function delete($id)
    {
        // $obj = Slide::where('id', $id)->first();
        // unlink(public_path('upload/' . $obj->photo));
        // $obj->delete();
        // return redirect()->back()->with('success', 'Slider information is deleted successlly');
    }

    public function update(Request $request, $id)
    {
        // $obj = Slide::where('id', $id)->first();
        // if ($request->hasFile('photo')) {
        //     $request->validate([
        //         'photo' => 'required|mimes:jpg,jped,png,gif'
        //     ]);
        //     unlink(public_path('upload/' . $obj->photo));
            // Lay duoi file anh co the la jpg,png....
           // $ext = $request->file('photo')->extension();
            // dat ten file: admin.jpg...
            //$final_name = time() . '.' . $ext;
            // cap nhat anh vao file upload trong public/upload cua laravel
            // Moves the file to a new location
            //$request->file('photo')->move(public_path('upload/'), $final_name);
           // $obj->photo = $final_name;
       // }
        // $obj->heading = $request->heading;
        // $obj->text = $request->text;
        // $obj->button_text = $request->button_text;
        // $obj->button_url = $request->button_url;
        // $obj->update();
        // return redirect()->back()->with('success', 'Slider information is updated successlly');
    }
}
