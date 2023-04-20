@extends('admin.layout.app')

@section('heading', 'Add Room')
@section('main_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container px-4">
                <h1 class="mt-4">@yield('heading')</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Add Room</li>
                </ol>
                <div class="container-xl px-4 mt-4">
                    <hr class="mt-0 mb-4">
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">Photo</div>
                                <form action="{{ route('admin_room_store') }}" method="post" enctype="multipart/form-data">
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
                                        <input name="featured_photo" class="form-control form-control-lg" id="formFileLg"
                                            type="file" />
                                    </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">Room Information</div>
                                <div class="card-body">

                                    <!-- Form Group (username)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputName">Name *</label>
                                        <input name="name" class="form-control" id="inputName" type="text"
                                            placeholder="Name" value="{{ old('name') }}">
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputText">Description *</label>
                                        <textarea class="form-control" name="description" id="InputButtontext" rows="3">{{ old('description') }}</textarea>
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (Buttontext)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="InputButtontext">Price</label>
                                            <input class="form-control" name="price" id="InputButtontext" type="text"
                                                placeholder="Price" value="{{ old('price') }}">
                                        </div>
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (ButtontextURL)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="InputButtontext">Total rooms</label>
                                            <input class="form-control" name="total_rooms" type="text"
                                                placeholder="Total rooms" value="{{ old('total_rooms') }}">
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (ButtontextURL)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1">Amenities</label>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($all_amenities as $item)
                                                @php
                                                    $i++;
                                                @endphp
                                                <div class="form-check">
                                                    <input class="form-check-input" id="defaultcheck{{ $i }}"
                                                        name="arr_amenities[]" type="checkbox" value="{{ $item->id }}"
                                                        id="defaultCheck1" />
                                                    <label class="form-check-label" for="defaultCheck1{{ $i }}">
                                                        {{ $item->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (ButtontextURL)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="InputButtontext">Room size</label>
                                            <input class="form-control" name="size" type="text" placeholder="size"
                                                value="{{ old('size') }}">
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (ButtontextURL)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="InputButtontext">Beds</label>
                                            <input class="form-control" name="total_beds" type="text"
                                                placeholder="total_beds" value="{{ old('total_beds') }}">
                                        </div>
                                    </div>

                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (ButtontextURL)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="InputButtontext">Bathroom</label>
                                            <input class="form-control" name="total_bathrooms" type="text"
                                                placeholder="total_bathrooms" value="{{ old('total_bathrooms') }}">
                                        </div>
                                    </div>

                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (ButtontextURL)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="InputButtontext">Balconies</label>
                                            <input class="form-control" name="total_balconies" type="text"
                                                placeholder="total_balconies" value="{{ old('total_balconies') }}">
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (ButtontextURL)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="InputButtontext">Gusts</label>
                                            <input class="form-control" name="total_guests" type="text"
                                                placeholder="total_guests" value="{{ old('total_guests') }}">
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (ButtontextURL)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="InputButtontext">video it</label>
                                            <input class="form-control" name="video_id" type="text"
                                                placeholder="video_id" value="{{ old('video_id') }}">
                                        </div>
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
