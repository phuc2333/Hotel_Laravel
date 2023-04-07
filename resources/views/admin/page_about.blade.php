@extends('admin.layout.app')

@section('heading', 'Edit About Page')
@section('main_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container px-4">
                <h1 class="mt-4">@yield('heading')</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Edit About Page</li>
                </ol>
                <div class="container-xl px-4 mt-4">
                    <hr class="mt-0 mb-4">
                    <div class="row">
                      
                        <div class="col-12">
                            <form action="{{ route('admin_page_update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('post')
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">About Page Information</div>
                                <div class="card-body">

                                    <!-- Form Group (username)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputHeading">Heading *</label>
                                        <input name="about_heading" class="form-control" id="inputHeading" type="text"
                                            placeholder="About-Heading" value="{{ $page_data->about_heading }}">
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputContent">Content *</label>
                                        <textarea class="form-control" name="about_content" id="InputContent" rows="3">{{ $page_data->about_content }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputContent">Status *</label>
                                        <select name="about_status" class="form-control">
                                            <option value="1" @if ($page_data->about_status == 1)
                                                selected
                                            @endif>Show</option>
                                            <option value="0" @if ($page_data->about_status == 0)
                                                selected
                                            @endif>Hide</option>
                                        </select>
                                    </div>
                                    <!-- Save changes button-->
                                    <button class="btn btn-primary" type="submit">Update</button>
                                    </form>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @include('admin.layout.footer')
    </div>

@endsection
