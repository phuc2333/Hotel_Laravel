<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function single($id)
    {
     $single_room_data = Room::where('id',$id)->first();
     return view('front.room-detail',compact('single_room_data'));
    }
}
