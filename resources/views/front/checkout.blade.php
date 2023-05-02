@extends('front.layout.app')

@section('main_content')

<div class="checkout-container">
    <div class="checkout-left">
      <h2>Billing Information</h2>
      <form>
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="tel" id="phone" name="phone" required>
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <textarea id="address" name="address" required></textarea>
        </div>
        <div class="form-group">
          <button type="submit" style="width: 100%;">Continue to Payment</button>
        </div>
        
      </form>
    </div>
   
    <div class="checkout-right">
      <h2>Room Details</h2>   
      @if(session()->has('cart_room_id')) 
      <table>
        <thead>
         
          <tr>
            <th>Room Image</th>
            <th>Price</th>
            <th>Check-in Date</th>
            <th>Check-out Date</th>
          </tr>
          @php
       
          $arr_cart_room_id = array();
          $i = 0;
          $cart_room_id = session()->get('cart_room_id');
          
          foreach ($cart_room_id ?? [] as $value) {
              $arr_cart_room_id[$i] = $value;
              $i++;
          }
          
          $arr_cart_checkin_date = array();
          $i = 0;
          $cart_checkin_date = session()->get('cart_check_in');
          
          foreach ($cart_checkin_date ?? [] as $value) {
              $arr_cart_checkin_date[$i] = $value;
              $i++;
          }
          
          $arr_cart_checkout_date = array();
          $i = 0;
          $cart_checkout_date = session()->get('cart_check_out');
          
          foreach ($cart_checkout_date ?? [] as $value) {
              $arr_cart_checkout_date[$i] = $value;
              $i++;
          }
          
          $arr_cart_adult = array();
          $i = 0;
          $cart_adult = session()->get('cart_adult');
          
          foreach ($cart_adult ?? [] as $value) {
              $arr_cart_adult[$i] = $value;
              $i++;
          }
          
          $arr_cart_children = array();
          $i = 0;
          $cart_children = session()->get('cart_children');
          
          foreach ($cart_children ?? [] as $value) {
              $arr_cart_children[$i] = $value;
              $i++;
          }
          
          $my_Room_order = 0;
     
          for($i = 0; $i<count($arr_cart_room_id);$i++) {
          
          $room_data = DB::table('rooms')->where('id',$arr_cart_room_id[$i])->first();
       
          @endphp
          @php

$date1 = $cart_checkin_date[$i];
$date2 = $cart_checkout_date[$i];
$diff = strtotime($date2) - strtotime($date1);
$days = $diff / (60*60*24);
$total_price = $days * $room_data->price;

$my_Room_order += $total_price;
@endphp
        </thead>
        <tbody>
          <tr>
            <td class="images">
                              <a href="#">
                                  <img src="{{ asset('upload/'. $room_data->featured_photo) }}" alt="spoppinge-home-1" class="img-responsive" width="50" height="50">
                              </a>
           </td>
            <td>${{$room_data->price}}/night</td>
            <td>{{$date1}}</td>
            <td>{{$date2}}</td>
          </tr>
          @php
    } 
        @endphp 
        </tbody>
      </table>

      <div class="checkout-total">
        <p><strong>Total:</strong> {{$my_Room_order}}</p>
      </div>
    
    </div>
    @endif
  </div>
@endsection
