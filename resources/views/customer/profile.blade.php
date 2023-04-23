@extends('customer.layout.app')

@section('heading', 'Edit profile')
@section('main_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container px-4">
                <h1 class="mt-4">@yield('heading')</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Edit profile</li>
                </ol>
                <div class="container-xl px-4 mt-4">
                    <hr class="mt-0 mb-4">
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">Profile Picture</div>
                                <form action="{{ route('customer_profile_submit') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="card-body text-center">
                                        <!-- Profile picture image-->
                                        <img class="img-account-profile rounded-circle mb-2"
                                            src="{{ asset('upload/' . Auth::guard('customer')->user()->photo) }}"
                                            alt="" width="250" height="250">
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
                                <div class="card-header">Account Details</div>
                                <div class="card-body">

                                    <!-- Form Group (username)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputUsername">Username (how your name will
                                            appear to other users on the site)</label>
                                        <input name="name" class="form-control" id="inputUsername" type="text"
                                            placeholder="Enter your username"
                                            value="{{ Auth::guard('customer')->user()->name }}">
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                        <input name="email" class="form-control" id="inputEmailAddress" type="email"
                                            placeholder="Enter your email address"
                                            value="{{ Auth::guard('customer')->user()->email }}">
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (password)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="Inputpassword">Password</label>
                                            <input class="form-control" name="password" id="Inputpassword" type="password"
                                                placeholder="Password" value="">
                                        </div>
                                        <!-- Form Group (retype password)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputRetypePassword">Retype Password</label>
                                            <input class="form-control" id="inputRetypePassword" type="password"
                                                name="retype_password" placeholder="Retype password" value="">
                                        </div>
                                    </div>
                                    <!-- Save changes button-->
                                    <button class="btn btn-primary" type="submit">Save changes</button>
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
