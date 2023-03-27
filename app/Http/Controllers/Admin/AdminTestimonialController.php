<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::get();

        return view('admin.testimonial_view', compact('testimonials'));
    }

    public function add()
    {
        return view('admin.testimonial_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|mimes:jpg,jped,png,gif',
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required'
        ]);
        // Lay duoi file anh co the la jpg,png....
        $ext = $request->file('photo')->extension();
        // dat ten file: admin.jpg...
        $final_name = time() . '.' . $ext;
        // cap nhat anh vao file upload trong public/upload cua laravel
        // Moves the file to a new location
        $request->file('photo')->move(public_path('upload/'), $final_name);

        $obj = new Testimonial();
        $obj->photo = $final_name;
        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->comment = $request->comment;
        $obj->save();

        return redirect()->back()->with('success', 'Testimonial information is added successlly');
    }

    public function edit($id)
    {
        $testimonial_data = Testimonial::where('id', $id)->first();
        return view('admin.testimonial_edit', compact('testimonial_data'));
    }

    public function delete($id)
    {
        $obj = Testimonial::where('id', $id)->first();
        unlink(public_path('upload/' . $obj->photo));
        $obj->delete();
        return redirect()->back()->with('success', 'Testimonial information is deleted successlly');
    }

    public function update(Request $request, $id)
    {
        $obj = Testimonial::where('id', $id)->first();
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimes:jpg,jped,png,gif',
                'name' => 'required',
                'designation' => 'required',
                'comment' => 'required'
            ]);
            unlink(public_path('upload/' . $obj->photo));
            // Lay duoi file anh co the la jpg,png....
            $ext = $request->file('photo')->extension();
            // dat ten file: admin.jpg...
            $final_name = time() . '.' . $ext;
            // cap nhat anh vao file upload trong public/upload cua laravel
            // Moves the file to a new location
            $request->file('photo')->move(public_path('upload/'), $final_name);
            $obj->photo = $final_name;
        }
        $obj->photo = $final_name;
        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->comment = $request->comment;
        $obj->update();
        return redirect()->back()->with('success', 'Testimonial information is updated successlly');
    }
}
