@extends('admin.layout.app')

@section('heading', 'Edit Room')
@section('main_content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container px-4">
                <h1 class="mt-4">@yield('heading')</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Edit room</li>
                </ol>
                <div class="container-xl px-4 mt-4">
                    <hr class="mt-0 mb-4">
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">Change Photo</div>
                                <form action="{{ route('admin_room_update', $room_data->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="card-body text-center">
                                        <!-- Profile picture image-->
                                        <img class="img-account-profile rounded-circle mb-2"
                                            src="{{ asset('upload/' . $room_data->featured_photo) }}" alt="" width="250"
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
                                <div class="card-header">Room Information</div>
                                <div class="card-body">

                                    <!-- Form Group (username)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputHeading">Name *</label>
                                        <input name="name" class="form-control" id="inputHeading" type="text"
                                            placeholder="name" value="{{ $room_data->name }}">
                                    </div>
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputText">Description *</label>
                                        <textarea class="form-control" name="description"  rows="3">{{ $room_data->description }}</textarea>
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (Buttontext)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="InputButtontext">Price</label>
                                            <input class="form-control" name="price" 
                                                type="text" placeholder="Price"
                                                value="{{ $room_data->price }}">
                                        </div>
                                    </div>
                                   
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (Buttontext)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="InputButtontext">Size</label>
                                            <input class="form-control" name="size" 
                                                type="text" placeholder="Size"
                                                value="{{ $room_data->size }}">
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (Buttontext)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="InputButtontext">Total rooms</label>
                                            <input class="form-control" name="total_rooms" 
                                                type="text" placeholder="Total rooms"
                                                value="{{ $room_data->total_rooms }}">
                                        </div>
                                    </div>
                              <!-- Form Row-->
                              <div class="row gx-3 mb-3">
                                <!-- Form Group (Buttontext)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="InputButtontext">Amenities</label>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach($all_amenities as $item)
                                    @if(in_array($item->id,$existing_amenities))
                                    @php
                                    $selected_type = 'checked'
                                    @endphp
                                    @else
                                    @php
                                    $selected_type = ''
                                    @endphp
                                    @endif
                                    @php
                                        $i++;
                                    @endphp
                                    <div class="form-check">
                                        <input {{ $selected_type}} type="checkbox" class="form-check-input" value="{{$item->id}}" id="defaultCheck{{$i}}"
                                        name="arr_amenities[]"/>
                                        <label class="form-check-label" for="defaultCheck{{$i}}">{{$item->name}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (Buttontext)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="InputButtontext">Total_beds</label>
                                            <input class="form-control" name="total_beds" 
                                                type="text" placeholder="total_beds"
                                                value="{{ $room_data->total_beds }}">
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (Buttontext)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="InputButtontext">Total bathrooms</label>
                                            <input class="form-control" name="total_bathrooms" 
                                                type="text" placeholder="total_bathrooms"
                                                value="{{ $room_data->total_bathrooms }}">
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (Buttontext)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="InputButtontext">Total balconies</label>
                                            <input class="form-control" name="total_balconies" 
                                                type="text" placeholder="Total_balconies"
                                                value="{{ $room_data->total_beds }}">
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (Buttontext)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="InputButtontext">Total guests</label>
                                            <input class="form-control" name="total_guests" 
                                                type="text" placeholder="total_guests"
                                                value="{{ $room_data->total_guests }}">
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (Buttontext)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="InputButtontext">Total guests</label>
                                            <input class="form-control" name="video_id" 
                                                type="text" placeholder="video id"
                                                value="{{ $room_data->video_id }}">
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
