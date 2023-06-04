@extends('admin.layout.app')

@section('heading', 'Order room offline or online view')

@section('main_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">@yield('heading')</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Room order</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Order Online</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                               <a style="text-decoration: none;color:black" href="{{route('admin_roomOrderOnline')}}">Nhận phòng</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">Order Offline</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a style="text-decoration: none;color:black" href="{{route('admin_roomOrderOffline')}}">Đặt phòng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @include('admin.layout.footer')
    </div>
@endsection
