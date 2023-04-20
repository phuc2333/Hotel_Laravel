{{-- Trang nguoi dung home --}}
@extends('front.layout.app')

@section('main_content')
    <!-- Hero Section Begin -->
    {{-- <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                   
                    @foreach ($slide_all as $item)
                    
                    <div class="hero-text">
                        <h1>{{$item->heading}}</h1>
                        <p>{{$item->text}}</p>
                        <a href="{{$item->button_url}}" class="primary-btn">{{$item->button_text}}</a>
                    </div>
                     @endforeach
                </div>
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <h3>Booking Your Hotel</h3>
                        <form action="#">
                            <div class="check-date">
                                <label for="date-in">Check In:</label>
                                <input type="text" class="date-input" id="date-in">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="check-date">
                                <label for="date-out">Check Out:</label>
                                <input type="text" class="date-input" id="date-out">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="select-option">
                                <label for="guest">Guests:</label>
                                <select id="guest">
                                    <option value="">2 Adults</option>
                                    <option value="">3 Adults</option>
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="room">Room:</label>
                                <select id="room">
                                    <option value="">1 Room</option>
                                    <option value="">2 Room</option>
                                </select>
                            </div>
                            <button type="submit">Check Availability</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            @foreach ($slide_all as $item)
           
            <div class="hs-item set-bg" data-setbg={{asset('upload/'.$item->photo)}}></div>
            @endforeach
        </div>
       
    </section> --}}
    <!-- Hero Section End -->

    {{-- test --}}
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($slide_all as $item)
            <div class="carousel-item @if($item->heading === "Sona A Luxury Hotel") active @endif ">
                <div class="text-white position-absolute text-center" style="top: 200px;
            left: 350px;">
                    <h1>{{$item->heading}}</h1>
                    <p>{{$item->text}}</p>
                    <a href="{{$item->button_url}}" class="btn btn-primary">{{$item->button_text}}</a>
                </div>
                <img class="d-block w-100" src="upload/{{$item->photo}}" alt="First slide">
            </div>
         @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    {{-- endTest --}}
 
        <div class="booking-form">
            <h3>Booking Your Hotel</h3>
            <form action="#" class="d-flex">
                <div class="check-date col-3">
                    <label for="date-in">Check In:</label>
                    <input type="text" class="date-input" id="date-in">
                    <i class="icon_calendar"></i>
                </div>
                <div class="check-date col-3">
                    <label for="date-out">Check Out:</label>
                    <input type="text" class="date-input" id="date-out">
                    <i class="icon_calendar"></i>
                </div>
                <div class="select-option col-2">
                    <label for="guest">Guests:</label>
                    <select id="guest">
                        <option value="">2 Adults</option>
                        <option value="">3 Adults</option>
                    </select>
                </div>
                <div class="select-option col-2">
                    <label for="room">Room:</label>
                    <select id="room">
                        <option value="">1 Room</option>
                        <option value="">2 Room</option>
                    </select>
                </div>
                <button class="col-2" type="submit">Check Availability</button>
            </form>
        </div>
    
    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>About Us</span>
                            <h2>Intercontinental LA <br />Westlake Hotel</h2>
                        </div>
                        <p class="f-para">Sona.com is a leading online accommodation site. We’re passionate about
                            travel. Every day, we inspire and reach millions of travelers across 90 local websites in 41
                            languages.</p>
                        <p class="s-para">So when it comes to booking the perfect hotel, vacation rental, resort,
                            apartment, guest house, or tree house, we’ve got you covered.</p>
                        <a href="#" class="primary-btn about-btn">Read More</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="{{ asset('dist-front/img/about/about-1.jpg') }}" alt="">
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('dist-front/img/about/about-2.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->

    <!-- Services Section End -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>What We Do</span>
                        <h2>Discover Our Services</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($feature_all as $row)
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="{{$row->icon}}"></i>
                        <h4>{{$row->heading}}</h4>
                        <p>{{$row->text}}</p>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Home Room Section Begin -->
    <section class="hp-room-section">
        <div class="container-fluid">
            <div class="hp-room-items">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="img/room/room-b1.jpg">
                            <div class="hr-text">
                                <h3>Double Room</h3>
                                <h2>199$<span>/Pernight</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max persion 5</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed:</td>
                                            <td>King Beds</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="img/room/room-b2.jpg">
                            <div class="hr-text">
                                <h3>Premium King Room</h3>
                                <h2>159$<span>/Pernight</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max persion 5</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed:</td>
                                            <td>King Beds</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="img/room/room-b3.jpg">
                            <div class="hr-text">
                                <h3>Deluxe Room</h3>
                                <h2>198$<span>/Pernight</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max persion 5</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed:</td>
                                            <td>King Beds</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="img/room/room-b4.jpg">
                            <div class="hr-text">
                                <h3>Family Room</h3>
                                <h2>299$<span>/Pernight</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Size:</td>
                                            <td>30 ft</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacity:</td>
                                            <td>Max persion 5</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Bed:</td>
                                            <td>King Beds</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Services:</td>
                                            <td>Wifi, Television, Bathroom,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">More Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Room Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad">
      
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Testimonials</span>
                        <h2>What Customers Say?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="testimonial-slider owl-carousel">
                        @foreach($testimonial_all as $row)
                        <div class="ts-item">
                            <p>{{$row->comment}}</p>
                            <div class="ti-author">
                                <div class="rating">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star-half_alt"></i>
                                </div>
                                <h5> - {{$row->name}}</h5>
                            </div>
                            <img src="{{asset('upload/'.$row->photo)}}" alt="">
                        </div>
                        @endforeach
                   
                    </div>
                </div>
            </div>
        </div>
      
    </section>
    <!-- Testimonial Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
           
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Hotel News</span>
                        <h2>Our Blog & Event</h2>
                    </div>
                </div>
            </div>
           
            <div class="row">
                @foreach($blog_all as $row)
                
                @if($loop->iteration === 4)
                <div class="col-lg-8">
                    <div class="blog-item set-bg" data-setbg="{{asset('uploads/'.$row->photo)}}">
                        <div class="bi-text">
                            <span class="b-tag">{{$row->heading}}</span>
                            <h4><a href="{{route('blog',$row->id)}}">{{$row->short_content}}</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                        </div>
                    </div>
                </div>
                    
                @else
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="{{asset('uploads/'.$row->photo)}}">
                        <div class="bi-text">
                            <span class="b-tag">{{$row->heading}}</span>
                            <h4><a href="{{route('blog',$row->id)}}">{{$row->short_content}}</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
             
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
