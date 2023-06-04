@extends('admin.layout.app')

@section('heading', 'View Customer')

@section('right_top_button')
<a href="{{route('admin_room_add')}}" class="btn btn-primary">Add New</a>
@endsection
@section('main_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Room-View</h1>
                @yield('right_top_button')
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($customers as $row)
                                    <tr>
                                        <td>1</td>
                                        <td><img src="{{ asset('upload/' . $row->photo) }}" alt="" width="60" height="60"></td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->phone}}</td>
                                        <td class="pt_10 pb_10">
                                            @if($row->status == 1)
                                            <a class="btn btn-success" href="{{route('admin_customer_change',$row->id)}}">Active</a>
                                            @else
                                            <a class="btn btn-danger" href="{{route('admin_customer_change',$row->id)}}">Pending</a>
                                            @endif
                                        </td>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Detail room</h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  <div class="col-12 d-flex flex-row"><p style="color: black; font-weight: bold; padding-right: 5px">Name:</p> {{$row->name}}</div>
                                                  <div class="col-12 d-flex flex-row"><p style="color: black; font-weight: bold; padding-right: 5px">Description: </p>{{$row->description}}</div>
                                                  <div class="col-12 d-flex flex-row"><p style="color: black; font-weight: bold; padding-right: 5px"> Price: </p>{{$row->price}}</div>
                                                  <div class="col-12 d-flex flex-row"><p style="color: black; font-weight: bold ;padding-right: 5px">Total_room: </p>{{$row->total_rooms}}</div>
                                                  <div class="col-12 d-flex flex-row"><p style="color: black; font-weight: bold; padding-right: 5px">Total-beds: </p> {{$row->total_beds}}</div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
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