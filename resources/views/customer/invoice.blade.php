@extends('customer.layout.app')

@section('heading', 'View order')

@section('main_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Orders-Invoice</h1>
                @yield('right_top_button')

                @csrf
                <div class="card mb-4">
                    <div>

                        <span>Order Invoice: {{ $order->order_no }}</span> <br>

                        <span>Invoice To: {{ Auth::guard('customer')->user()->name }}
                            {{ Auth::guard('customer')->user()->address }}
                            {{ Auth::guard('customer')->user()->state }}
                            {{ Auth::guard('customer')->user()->city }}
                            {{ Auth::guard('customer')->user()->zip }}
                        </span><br>

                        <span>
                            Invoice Date: {{ $order->booking_date }}
                        </span>
                    </div>
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Orders
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Room Name</th>
                                    <th>Checkin Date</th>
                                    <th>Checkout Date</th>
                                    <th>Number of Adult</th>
                                    <th>Number of children</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $my_Room_order = 0;
                                @endphp
                                @foreach ($order_detail as $row)
                                    @php
                                        $room_data = DB::table('rooms')
                                            ->where('id', $row->room_id)
                                            ->first();
                                        $date1 = $row->checkin_date;
                                        $date2 = $row->checkout_date;
                                        $diff = strtotime($date2) - strtotime($date1);
                                        $days = $diff / (60 * 60 * 24);
                                        $total_price = $days * $room_data->price;
                                        
                                        $my_Room_order += $total_price;
                                    @endphp
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $room_data->name }}
                                        </td>
                                        <td>
                                            {{ $row->checkin_date }}
                                        </td>
                                        <td>
                                            {{ $row->checkout_date }}
                                        </td>
                                        <td>
                                            {{ $row->adult }}
                                        </td>
                                        <td>
                                            {{ $row->children }}
                                        </td>
                                        <td>
                                            {{ $total_price }}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <span style="float: right">
                            Total: {{ $my_Room_order }}$
                        </span>
                        <button id="print-button" type="submit" class="btn btn-primary print-button">Print</button>
                    </div>
                </div>

            </div>
        </main>
        @include('admin.layout.footer')
    </div>

    <main id="order-container" class='invoice' style="display: none">
     
        <div class='invoice-wrapper'>
            <div class='invoice-billing'>
                <h2 class='invoice-billing-company'>Hotel Sona Order</h2>
                <p class='invoice-billing-address'>
                    <span>2258 Lansing Blvd</span>
                    <span>Detroid, Michigan</span>
                </p>
            </div>
            <div class='invoice-details'>
                <div class='invoice-info'>
                    <span class='invoice-info-key'>Order No:</span>
                    <span class='invoice-info-value'>{{$order->order_no }}</span>
                </div>
                <div class='invoice-info'>
                    <span class='invoice-info-key'>Invoice To:</span>
                    <span class='invoice-info-value'>{{ Auth::guard('customer')->user()->name }}</span>
                </div>
                <div class='invoice-info'>
                    <span class='invoice-info-key'>Invoice Date::</span>
                    <span class='invoice-info-value'>{{$order->booking_date}}</span>
                </div>
            </div>
        </div>
        <table class='invoice-table'>
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Room Name</th>
                    <th>Checkin Date</th>
                    <th>Checkout Date</th>
                    <th>Number of Adult</th>
                    <th>Number of children</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $my_Room_order = 0;
                @endphp
                @foreach ($order_detail as $row)
                    @php
                        $room_data = DB::table('rooms')
                            ->where('id', $row->room_id)
                            ->first();
                        $date1 = $row->checkin_date;
                        $date2 = $row->checkout_date;
                        $diff = strtotime($date2) - strtotime($date1);
                        $days = $diff / (60 * 60 * 24);
                        $total_price = $days * $room_data->price;
                        
                        $my_Room_order += $total_price;
                    @endphp
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $room_data->name }}
                        </td>
                        <td>
                            {{ $row->checkin_date }}
                        </td>
                        <td>
                            {{ $row->checkout_date }}
                        </td>
                        <td>
                            {{ $row->adult }}
                        </td>
                        <td>
                            {{ $row->children }}
                        </td>
                        <td>
                            {{ $total_price }}
                        </td>
                    </tr>
                @endforeach
              
        </table>
        <span style="float: right">
            Total: {{ $my_Room_order }}$
        </span>
        <ion-icon id="print-outline" class='invoice-print'></ion-icon>
    </main>
 
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        document.getElementById('print-button').addEventListener('click', function() {
            var printWindow = window.open('', 'Print Preview');
            var html = document.getElementById('order-container').innerHTML;
            printWindow.document.write(
                '<html><head><titleIn đơn hàng</title><style></style></style></head><body>' +
                html + '</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
@endsection
