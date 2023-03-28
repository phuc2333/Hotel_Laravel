@extends('front.layout.app')

@section('main_content')
<!-- Blog Details Hero Section Begin -->

<section class="blog-details-hero set-bg" data-setbg="{{asset('uploads/'.$single_post_data->photo)}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="bd-hero-text">
                    <span>{{$single_post_data->heading}}</span>
                    <h2>{{$single_post_data->short_content}}</h2>
                    <ul>
                        <li class="b-time"> <i class="icon_clock_alt"></i>  {{ date('d, M, Y', strtotime($single_post_data->updated_at))}}</li>
                        <li><i class="icon_profile"></i> Kerry Jones</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Hero End -->

<!-- Blog Details Section Begin -->
<section class="blog-details-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="blog-details-text">
                    <div class="bd-title">
                      {!! $single_post_data->content !!}
                    </div>
                
                    <div class="tag-share">
                        <div class="tags">
                            <a href="#">Travel Trip</a>
                            <a href="#">Camping</a>
                            <a href="#">Event</a>
                        </div>
                        <div class="social-share">
                            <span>Share:</span>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-tripadvisor"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                    <div class="comment-option">
                        <h4>2 Comments</h4>
                        <div class="single-comment-item first-comment">
                            <div class="sc-author">
                                <img src="img/blog/blog-details/avatar/avatar-1.jpg" alt="">
                            </div>
                            <div class="sc-text">
                                <span>27 Aug 2019</span>
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et
                                    dolore magnam.</p>
                                <a href="#" class="comment-btn">Like</a>
                                <a href="#" class="comment-btn">Reply</a>
                            </div>
                        </div>
                        <div class="single-comment-item reply-comment">
                            <div class="sc-author">
                                <img src="img/blog/blog-details/avatar/avatar-2.jpg" alt="">
                            </div>
                            <div class="sc-text">
                                <span>27 Aug 2019</span>
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et
                                    dolore magnam.</p>
                                <a href="#" class="comment-btn like-btn">Like</a>
                                <a href="#" class="comment-btn reply-btn">Reply</a>
                            </div>
                        </div>
                        <div class="single-comment-item second-comment ">
                            <div class="sc-author">
                                <img src="img/blog/blog-details/avatar/avatar-3.jpg" alt="">
                            </div>
                            <div class="sc-text">
                                <span>27 Aug 2019</span>
                                <h5>Brandon Kelley</h5>
                                <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et
                                    dolore magnam.</p>
                                <a href="#" class="comment-btn">Like</a>
                                <a href="#" class="comment-btn">Reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="leave-comment">
                        <h4>Leave A Comment</h4>
                        <form action="#" class="comment-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email">
                                </div>
                                <div class="col-lg-12 text-center">
                                    <input type="text" placeholder="Website">
                                    <textarea placeholder="Messages"></textarea>
                                    <button type="submit" class="site-btn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Details Section End -->

<!-- Recommend Blog Section Begin -->
<section class="recommend-blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Recommended</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="blog-item set-bg" data-setbg="img/blog/blog-1.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Travel Trip</span>
                        <h4><a href="#">Tremblant In Canada</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-item set-bg" data-setbg="img/blog/blog-2.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Camping</span>
                        <h4><a href="#">Choosing A Static Caravan</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="blog-item set-bg" data-setbg="img/blog/blog-3.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Event</span>
                        <h4><a href="#">Copper Canyon</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 21th April, 2019</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Recommend Blog Section End -->
@endsection