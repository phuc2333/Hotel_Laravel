@extends('admin.layout.app')

@section('heading', 'Add post')
@section('main_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container px-4">
                <h1 class="mt-4">@yield('heading')</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Add post</li>
                </ol>
                <div class="container-xl px-4 mt-4">
                    <hr class="mt-0 mb-4">
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">Photo</div>
                                <form action="{{ route('admin_post_store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="card-body text-center">
                                        <!-- Profile picture image-->
                                        <img class="img-account-profile rounded-circle mb-2"
                                            src="{{ asset('upload/' . Auth::guard('admin')->user()->photo) }}"
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
                                <div class="card-header">Post Information</div>
                                <div class="card-body">

                                    <!-- Form Group (username)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputHeading">Heading *</label>
                                        <input name="heading" class="form-control" id="inputHeading" type="text"
                                            placeholder="Heading" value="{{ old('heading') }}">
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputText">Short-Content *</label>
                                        <input class="form-control" name="short_content" id="InputButtontext" rows="3" value="{{ old('short_content') }}"/>
                                    </div>
                                    <!-- Form Row-->
                                    
                                        <!-- Form Group (Buttontext)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="InputButtontext">Content</label>
                                            <textarea name="content" id="editor">
                                                {{ old('content') }}
                                            </textarea>
                                        </div>
                                  
                                    <!-- Form Row-->
                                  
                                        <!-- Form Group (ButtontextURL)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="InputButtontext">Total view</label>
                                            <input class="form-control" name="total_view" id="InputButtonURL" type="text"
                                                placeholder="total_view" value="{{ old('total_view') }}">
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
