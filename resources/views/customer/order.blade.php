@extends('customer.layout.app')

@section('heading', 'View order')
 
@section('main_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Orders-View</h1>
                @yield('right_top_button')
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Orders
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Order No</th>
                                    <th>Payment Method</th>
                                    <th>Booking date</th>
                                    <th>Paid Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($orders as $row)
                                    <tr>
                                        <td> {{$loop->iteration}}</td>
                                       
                                        <td>
                                            {{$row->order_no}}
                                        </td>
                                        <td>
                                            {{$row->payment_method}}
                                        </td>
                                        <td>
                                            {{$row->booking_date}}
                                        </td>
                                        <td>
                                            {{$row->paid_amount}}
                                        </td>
                                        <td class="pt_10 pb_10">
                                            <a class="btn btn-primary"
                                                href="{{ route('customer_invoice', $row->id) }}">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        @include('admin.layout.footer')
    </div>
@endsection
