@extends('front.layout.app')

@section('main_content')
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<div class="checkout-container">
    <div class="checkout-left">
      <h2>Make payment</h2>
      <form>

        <div class="paypal mt20">
         <h4>Pay with Paypal</h4>
         <div id="paypal-button-container"></div>
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
  @php
      $client = 'AXvgYZocdePq8LlpiXQqc15KIkxW9g7UH2yJqaLhySj5Y57Y_-E_BDntbWlm8KUdJAm_c9cwzUAv2I4R';
      $final_price = $my_Room_order;
  @endphp
      <script>

    // Render the PayPal button

    paypal.Button.render({

// Set your environment

env: 'sandbox', // sandbox | production

// Specify the style of the button

style: {
    label: 'checkout',
    size:  'small',    // small | medium | large | responsive
    shape: 'pill',     // pill | rect
    color: 'gold'      // gold | blue | silver | black
},

// PayPal Client IDs - replace with your own
// Create a PayPal app: https://developer.paypal.com/developer/applications/create

client: {
    sandbox:    'AXvgYZocdePq8LlpiXQqc15KIkxW9g7UH2yJqaLhySj5Y57Y_-E_BDntbWlm8KUdJAm_c9cwzUAv2I4R',
    production: '<insert production client id>'
},

payment: function(data, actions) {
    return actions.payment.create({
        payment: {
          redirect_urls:{
              return_url: '{{ url("payment/paypal/$final_price") }}'
            },
            transactions: [
                {
                    amount: { total: {{ $final_price}}, currency: 'USD' }
                }
            ]
        }
    });
},

onAuthorize: function(data, actions) {
    return actions.redirect();
}

}, '#paypal-button-container');
    </script>
@endsection
