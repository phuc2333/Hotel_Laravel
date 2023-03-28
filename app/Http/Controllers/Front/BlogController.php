<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
   public function single($id)
   {
    $single_post_data = Post::where('id',$id)->first();
    $single_post_data->total_view = $single_post_data->total_view + 1;
    $single_post_data->update();
    return view('front.blog',compact('single_post_data'));
   }
}
