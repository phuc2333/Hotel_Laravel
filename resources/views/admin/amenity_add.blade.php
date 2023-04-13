@extends('admin.layout.app')

@section('heading', 'Add Amenity')
@section('main_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container px-4">
                <h1 class="mt-4">@yield('heading')</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Add Amenity</li>
                </ol>
                <div class="container-xl px-4 mt-4">
                    <hr class="mt-0 mb-4">
                    <div class="row">
                        <!-- Profile picture card-->
                        <form action="{{ route('admin_amenity_store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="col-xl-12">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header">Amenity Information</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputIcon">Name *</label>
                                            <input name="name" class="form-control" id="inputIcon" type="text"
                                                placeholder="Name" value="{{ old('name') }}">
                                        </div>
                                  
                                        <!-- Save changes button-->
                                        <button class="btn btn-primary" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </div>
    </main>
    @include('admin.layout.footer')
    </div>

@endsection
