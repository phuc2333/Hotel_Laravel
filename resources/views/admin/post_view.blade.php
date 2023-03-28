@extends('admin.layout.app')

@section('heading', 'View Slides')

@section('right_top_button')
    <a href="{{ route('admin_post_add') }}" class="btn btn-primary">Add New</a>
@endsection
@section('main_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Post-View</h1>
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
                                    <th>Heading</th>
                                    <th>Short_content</th>
                                    <th>Content</th>
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
                                @foreach ($posts as $row)
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <img src="{{ asset('uploads/' . $row->photo) }}" alt="" width="60"
                                                height="60">
                                        </td>
                                        <td>
                                            {{$row->heading}}
                                        </td>
                                        <td>
                                            {{$row->short_content}}
                                        </td>
                                        <td>
                                            {{$row->content}}
                                        </td>
                                        <td class="pt_10 pb_10">
                                            <a class="btn btn-primary"
                                                href="{{ route('admin_post_edit', $row->id) }}">Edit</a>
                                            <a href="{{ route('admin_post_delete', $row->id) }}" class="btn btn-danger"
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
