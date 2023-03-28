<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Testimonial;
use App\Models\Post;
class HomeController extends Controller
{
    public function index()
    {
       $slide_all = Slide::get();
       $feature_all = Feature::get();
       $testimonial_all = Testimonial::get();
        $blog_all = Post::limit(5)->get();
        return view('front.home',compact('slide_all','feature_all','testimonial_all','blog_all'));
    }
}
