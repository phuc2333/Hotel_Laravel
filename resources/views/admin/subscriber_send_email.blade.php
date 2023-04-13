@extends('admin.layout.app')

@section('heading', 'Add Subscribers')
@section('main_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container px-4">
                <h1 class="mt-4">@yield('heading')</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Send Subscribers</li>
                </ol>
                <div class="container-xl px-4 mt-4">
                    <hr class="mt-0 mb-4">
                    <div class="row">

                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">Subscribers Information</div>
                                <div class="card-body">
                                    <form action="{{ route('admin_subscriber_send_email_submit') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('post')
                                        <!-- Form Group (username)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputHeading">Subject *</label>
                                            <input name="subject" class="form-control" id="inputHeading" type="text"
                                                placeholder="subject" value="{{ old('subject') }}">
                                        </div>
                                        <!-- Form Group (email address)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputText">Message *</label>
                                            <textarea class="form-control" name="message" id="InputButtontext" rows="3">{{ old('text') }}</textarea>
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
