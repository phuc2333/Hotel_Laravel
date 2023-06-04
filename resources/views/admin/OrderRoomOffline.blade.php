@extends('admin.layout.app')

@section('heading', 'Order room')

@section('main_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">@yield('heading')</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Room order offline</li>
                </ol>
                <div class="row">

                    @foreach ($array as $key => $value)
                        <h2>{{ $key }}</h2>
                        @foreach ($value as $item)
                            @if(is_array($item))
                            @foreach($item as $subitem)
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">{{ $subitem }}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a href="">link</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">{{ $item }}</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a href="">link</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </main>
        @include('admin.layout.footer')
    </div>
@endsection
