@extends('front.layout.app')
@section('main_content')
<div class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-area">
                    <h2>Shopping Cart</h2>
                    <p>Whether you're looking to sell or let your home or want to buy or rent a home, we really are the people for you to come to.</p>
                    <a href="index.html" class="btn btn-fill">Home</a>
                    <a href="shopping-cart.html" class="btn btn-fill btn-default">Shopping Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shopping-cart-body">
    <div class="container">
        <div class="row">
            <div class="table">
                <h3 class="title">Shopping Cart</h3>
                @if(session()->has('cart_room_id'))
                <table class="cart-product">
                    <tbody>
               
                        <tr>
                            <th class="images">
                            </th>
                            <th class="bg name" style="
                            line-height: 42px;
                        ">Room</th>
                            <th class="edit">Price </th>
                            <th class="bg price">Number Night</th>
                            <th class="bg subtotal">Subtotal</th>
                            <th class="close"> </th>
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
                     //  dd($room_data->featured_photo);
                      @endphp
                      <tr>
                          <td class="images">
                              <a href="#">
                                  <img src="{{ asset('upload/'. $room_data->featured_photo) }}" alt="spoppinge-home-1" class="img-responsive">
                              </a>
                          </td>
                          <td class="bg name">
                               <span>{{$cart_checkin_date[$i]}} - </span>
                              <span>{{$cart_checkout_date[$i]}}</span>
                          </td>
                          <td class="bg price">${{$room_data->price}}</td>
                          @php
         
                          $date1 = $cart_checkin_date[$i];
                          $date2 = $cart_checkout_date[$i];
                          $diff = strtotime($date2) - strtotime($date1);
                          $days = $diff / (60*60*24);
                          $total_price = $days * $room_data->price;

                          $my_Room_order += $total_price;
                          @endphp

                          <td class="qty">{{$days}}/date</td>
                          <td class="bg subtotal">${{ $total_price}}</td>
                          <td class="delte">
                              <a href="{{route('cart_delete',['id' => $cart_room_id[$i]])}}">
                                  <i class="fa-solid fa-trash"></i>
                              </a>
                          </td>
                      </tr>
                    
                      @php
    } 
        @endphp 
                      <tr>
                          <td colspan="7" class="cart-but">
                              <button class="continue">
                                  <i class="fa fa-chevron-left"></i>Continue Booking</button>
                              <button class="update">
                                  <i class="fa fa-repeat"></i>Update Shopping Cart
                              </button>
                          </td>
                      </tr>

                  </tbody>

              </table>
          </div>

          <div class="content-bottom">
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="bottom-block">
                          <h4>Subtotal<span>${{  $my_Room_order }}</span></h4>
                          <h1>Grand Total<span>$1, 500.00</span></h1>
                          <form action="checkout.html">
                              <input type="submit" name="submit" class=" btn-fill mrg btn-warning" value="Proceed To Checkout">
                              <h5><a href="#">Checkout with Multiple Addresses</a></h5>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          @else      
          <div class="content-bottom">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="bottom-block">
                        cart empty
                    </div>
                </div>
            </div>
        </div>
          @endif
      </div>
                     

    </div>
</div>
@endsection


