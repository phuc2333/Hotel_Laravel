<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Room;
use App\Models\RoomOrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrderController extends Controller
{
    public function order()
    {
        $orders = Order::get();
       
        return view('admin.order_view',compact('orders'));
    }

    public function invoice($id)
    {
        $order = Order::where('id',$id)->first();
        $order_detail = OrderDetail::where('order_id',$id)->get();
        return view('admin.invoice',compact('order','order_detail'));
    }

    public function delete($id)
    {
        $obj = Order::where('id',$id)->delete();
        $obj = OrderDetail::where('order_id',$id)->delete();
        return redirect()->back()->with('success', 'Order is deleted successfully');
    }

    public function roomOrder()
    {
        return view('admin.orderRoom');
    }

    public function admin_roomOrderOnline()
    {
        return view('admin.OrderRoomOnline');
    }

    public function admin_roomOrderOffline()
    {
        $room_data = RoomOrderStatus::get();
        $room_data_type = Room::get();
        $array = [];
        foreach($room_data_type as $row1)
        {   
            $room_data_p = RoomOrderStatus::where('room_id',$row1->id)->get();
            foreach($room_data_p as $row2){
                $array[$row1->name][] = [
                    'room_name' => $row2->name
                ];
            }
           
        }
     // dd($array);
        return view('admin.OrderRoomOffline',compact('array'));
    }
}
