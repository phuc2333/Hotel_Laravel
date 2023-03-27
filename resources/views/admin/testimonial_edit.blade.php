@extends('admin.layout.app')

@section('heading', 'Edit Testimonial')
@section('main_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container px-4">
                <h1 class="mt-4">@yield('heading')</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Edit Testimonial</li>
                </ol>
                <div class="container-xl px-4 mt-4">
                    <hr class="mt-0 mb-4">
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">Change Photo</div>
                                <form action="{{ route('admin_testimonial_update', $testimonial_data->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="card-body text-center">
                                        <!-- Profile picture image-->
                                        <img class="img-account-profile rounded-circle mb-2"
                                            src="{{ asset('upload/' . $testimonial_data->photo) }}" alt="" width="250"
                                            height="250">
                                        <!-- Profile picture help block-->
                                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                        <!-- Profile picture upload button-->
                                        <input name="photo" class="form-control form-control-lg" id="formFileLg"
                                            type="file" />
                                    </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">Testimonial Information</div>
                                <div class="card-body">

                                    <!-- Form Group (username)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputName">Name *</label>
                                        <input name="name" class="form-control" id="inputName" type="text"
                                            placeholder="Heading" value="{{ $testimonial_data->name }}">
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputDesignation">Designation *</label>
                                        <textarea class="form-control" name="designation" id="InputDesignation" rows="3">{{ $testimonial_data->designation }}</textarea>

                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (Buttontext)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="InputButtontext">Comment</label>
                                            <input class="form-control" name="comment" id="InputComment"
                                                type="text" placeholder="Comment"
                                                value="{{ $testimonial_data->comment }}">
                                        </div>
                                    </div>
                                  
                                    <!-- Save changes button-->
                                    <button class="btn btn-primary" type="submit">Update</button>
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
