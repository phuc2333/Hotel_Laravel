@extends('admin.layout.app')

@section('heading', 'View Features')

@section('right_top_button')
<a href="{{route('admin_slide_add')}}" class="btn btn-primary">Add Feature</a>
@endsection
@section('main_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Slide-View</h1>
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
                                    <th>Icon</th>
                                    <th>Heading</th>
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
                                @foreach ($features as $row)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <i class="{{$row->}}"></i>
                                        </td>
                                        <td class="pt_10 pb_10">
                                            <a class="btn btn-primary" href="{{route('admin_slide_edit',$slide->id)}}">Edit</a>
                                            <a href="{{route('admin_slide_delete',$slide->id)}}" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</a>
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
