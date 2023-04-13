<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Http\Request;

class AdminAmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::get();
        return view('admin.amenity_view',compact('amenities'));
    } 

    public function add()
    {
        return view('admin.amenity_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        $obj = new Amenity();
        $obj->name = $request->name;
        $obj->save();

       return redirect()->back()->with('success', 'Amenity information is added successlly');
    }

    public function edit($id)
    {
         $amenity_data = Amenity::where('id', $id)->first();
         return view('admin.amenity_edit', compact('amenity_data'));
    }

    public function delete($id)
    {
        $obj = Amenity::where('id', $id)->first();
        $obj->delete();
        return redirect()->back()->with('success', 'Amenity information is deleted successlly');
    }

    public function update(Request $request, $id)
    {
        $obj = Amenity::where('id', $id)->first();
       
            $request->validate([
                'name' => 'required',
            ]);
        $obj->name = $request->name;
        $obj->update();
        return redirect()->back()->with('success', 'Amenity information is updated successlly');
    }

}
