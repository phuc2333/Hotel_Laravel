<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Room;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{
    public function index()
    {
        $rooms = Room::get();

        return view('admin.room_view', compact('rooms'));
    }

    public function add()
    {
        $all_amenities = Amenity::get();
        return view('admin.room_add', compact('all_amenities'));
    }

    public function store(Request $request)
    {
        $amenities = '';
        $i = 0;
        if(isset($request->arr_amenities)){
            foreach($request->arr_amenities as $item){
                if($i = 0){
                    $amenities .= $item;
                } else{
                    $amenities .= ','.$item;
                }
                $i++;
            }
        }
        $request->validate([
            'featured_photo' => 'required|mimes:jpg,jped,png,gif'
        ]);
        // Lay duoi file anh co the la jpg,png....
        $ext = $request->file('featured_photo')->extension();
        // dat ten file: admin.jpg...
        $final_name = time() . '.' . $ext;
        // cap nhat anh vao file upload trong public/upload cua laravel
        // Moves the file to a new location
        $request->file('featured_photo')->move(public_path('upload/'), $final_name);

        $obj = new Room();
        $obj->featured_photo = $final_name;
        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->total_rooms = $request->total_rooms;
        $obj->amenities = $amenities;
        $obj->price = $request->price;
        $obj->size = $request->size;
        $obj->total_beds = $request->total_beds;
        $obj->total_bathrooms = $request->total_bathrooms;
        $obj->total_balconies = $request->total_balconies;
        $obj->total_guests = $request->total_guests;
        $obj->video_id = $request->video_id;

        $obj->save();

        return redirect()->back()->with('success', 'Room information is added successlly');
    }

    public function edit($id)
    {
        $all_amenities = Amenity::get();
        $room_data = Room::where('id', $id)->first();

        $existing_amenities =  array();
        if($room_data->amenities != '')
        {
            $existing_amenities = explode(',',$room_data->amenities);
        }
        return view('admin.room_edit', compact('room_data','all_amenities','existing_amenities'));
    }

    public function delete($id)
    {
        $obj = Room::where('id', $id)->first();
        unlink(public_path('upload/' . $obj->featured_photo));
        $obj->delete();
        return redirect()->back()->with('success', 'Room information is deleted successlly');
    }

    public function update(Request $request, $id)
    {
        $amenities = '';
        $i = 0;
        if(isset($request->arr_amenities)){
            foreach($request->arr_amenities as $item){
                if($i = 0){
                    $amenities .= $item;
                } else{
                    $amenities .= ','.$item;
                }
                $i++;
            }
        }

        $obj = Room::where('id', $id)->first();
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimes:jpg,jped,png,gif'
            ]);
            unlink(public_path('upload/' . $obj->featured_photo));
            // Lay duoi file anh co the la jpg,png....
            $ext = $request->file('photo')->extension();
            // dat ten file: admin.jpg...
            $final_name = time() . '.' . $ext;
            // cap nhat anh vao file upload trong public/upload cua laravel
            // Moves the file to a new location
            $request->file('photo')->move(public_path('upload/'), $final_name);
            $obj->featured_photo = $final_name;
        }
        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->total_rooms = $request->total_rooms;
        $obj->amenities = $amenities;
        $obj->price = $request->price;
        $obj->size = $request->size;
        $obj->total_beds = $request->total_beds;
        $obj->total_bathrooms = $request->total_bathrooms;
        $obj->total_balconies = $request->total_balconies;
        $obj->total_guests = $request->total_guests;
        $obj->video_id = $request->video_id;
        $obj->update();
        return redirect()->back()->with('success', 'Room information is updated successlly');
    }

    public function gallery()
    {
        return view('admin.room_galery');
    }
}
