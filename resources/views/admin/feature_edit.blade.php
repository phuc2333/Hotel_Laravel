@extends('admin.layout.app')

@section('heading', 'Edit feature')
@section('main_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container px-4">
                <h1 class="mt-4">@yield('heading')</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Edit feature</li>
                </ol>
                <div class="container-xl px-4 mt-4">
                    <hr class="mt-0 mb-4">
                    <div class="row">
                        <!-- Profile picture card-->
                        <form action="{{ route('admin_feature_update', $feature_data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="col-xl-12">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header">Feature Information</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputIcon">Icon *</label>
                                            <input name="icon" class="form-control" id="inputIcon" type="text"
                                                placeholder="Icon" value="{{ $feature_data->icon }}">
                                        </div>
                                        <!-- Form Group (username)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputHeading">Heading *</label>
                                            <input name="heading" class="form-control" id="inputHeading" type="text"
                                                placeholder="Heading" value="{{  $feature_data->heading }}">
                                        </div>
                                        <!-- Form Group (email address)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputText">Text *</label>
                                            <textarea class="form-control" name="text" id="InputButtontext" rows="3">{{  $feature_data->text }}</textarea>
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
