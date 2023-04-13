<?php

use App\Http\Controllers\Admin\AdminAmenityController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSlideController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\SubscribeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function () {
    // admin
    Route::get('/home', [AdminHomeController::class, 'index'])->name('admin_home')->middleware('admin:admin');
    Route::get('/login', [AdminLoginController::class, 'index'])->name('admin_login');
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
    Route::post('/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
    Route::get('/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
    Route::post('/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
    Route::get('/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');
    Route::post('/reset-password-submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');

    Route::get('/edit-profile', [AdminProfileController::class, 'index'])->name('admin_edit_profile')->middleware('admin:admin');
    Route::post('/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');

    Route::get('/slide/view', [AdminSlideController::class, 'index'])->name('admin_slide_view')->middleware('admin:admin');
    Route::get('/slide/add', [AdminSlideController::class, 'add'])->name('admin_slide_add')->middleware('admin:admin');
    Route::post('/slide/store', [AdminSlideController::class, 'store'])->name('admin_slide_store')->middleware('admin:admin');
    Route::get('/slide/edit/{id}', [AdminSlideController::class, 'edit'])->name('admin_slide_edit')->middleware('admin:admin');
    Route::get('/slide/delete/{id}', [AdminSlideController::class, 'delete'])->name('admin_slide_delete')->middleware('admin:admin');
    Route::post('/slide/update/{id}', [AdminSlideController::class, 'update'])->name('admin_slide_update')->middleware('admin:admin');

    Route::get('/feature/view', [AdminFeatureController::class, 'index'])->name('admin_feature_view')->middleware('admin:admin');
    Route::get('/feature/add', [AdminFeatureController::class, 'add'])->name('admin_feature_add')->middleware('admin:admin');
    Route::post('/feature/store', [AdminFeatureController::class, 'store'])->name('admin_feature_store')->middleware('admin:admin');
    Route::get('/feature/edit/{id}', [AdminFeatureController::class, 'edit'])->name('admin_feature_edit')->middleware('admin:admin');
    Route::get('/feature/delete/{id}', [AdminFeatureController::class, 'delete'])->name('admin_feature_delete')->middleware('admin:admin');
    Route::post('/feature/update/{id}', [AdminFeatureController::class, 'update'])->name('admin_feature_update')->middleware('admin:admin');

    Route::get('/testimonial/view', [AdminTestimonialController::class, 'index'])->name('admin_testimonial_view')->middleware('admin:admin');
    Route::get('/testimonial/add', [AdminTestimonialController::class, 'add'])->name('admin_testimonial_add')->middleware('admin:admin');
    Route::post('/testimonial/store', [AdminTestimonialController::class, 'store'])->name('admin_testimonial_store')->middleware('admin:admin');
    Route::get('/testimonial/edit/{id}', [AdminTestimonialController::class, 'edit'])->name('admin_testimonial_edit')->middleware('admin:admin');
    Route::get('/testimonial/delete/{id}', [AdminTestimonialController::class, 'delete'])->name('admin_testimonial_delete')->middleware('admin:admin');
    Route::post('/testimonial/update/{id}', [AdminTestimonialController::class, 'update'])->name('admin_testimonial_update')->middleware('admin:admin');

    Route::get('/post/view', [AdminPostController::class, 'index'])->name('admin_post_view')->middleware('admin:admin');
    Route::get('/post/add', [AdminPostController::class, 'add'])->name('admin_post_add')->middleware('admin:admin');
    Route::post('/post/store', [AdminPostController::class, 'store'])->name('admin_post_store')->middleware('admin:admin');
    Route::get('/post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin_post_edit')->middleware('admin:admin');
    Route::get('/post/delete/{id}', [AdminPostController::class, 'delete'])->name('admin_post_delete')->middleware('admin:admin');
    Route::post('/post/update/{id}', [AdminPostController::class, 'update'])->name('admin_post_update')->middleware('admin:admin');

    Route::get('/page/about', [AdminPageController::class, 'about'])->name('admin_page_view')->middleware('admin:admin');
    Route::post('/page/about/update', [AdminPageController::class, 'about_update'])->name('admin_page_update')->middleware('admin:admin');

    Route::get('/page/cart', [AdminPageController::class, 'cart'])->name('admin_page_cart')->middleware('admin:admin');
    Route::post('/page/cart/update', [AdminPageController::class, 'cart_update'])->name('admin_page_cart_update')->middleware('admin:admin');

    Route::get('/page/checkout', [AdminPageController::class, 'checkout'])->name('admin_page_checkout')->middleware('admin:admin');
    Route::post('/page/checkout/update', [AdminPageController::class, 'checkout_update'])->name('admin_page_checkout_update')->middleware('admin:admin');

    Route::get('/page/payment', [AdminPageController::class, 'payment'])->name('admin_page_payment')->middleware('admin:admin');
    Route::post('/page/payment/update', [AdminPageController::class, 'payment_update'])->name('admin_page_payment_update')->middleware('admin:admin');

    Route::get('/page/signin', [AdminPageController::class, 'signin'])->name('admin_page_signin')->middleware('admin:admin');
    Route::post('/page/signin/update', [AdminPageController::class, 'signin_update'])->name('admin_page_signin_update')->middleware('admin:admin');

    Route::get('/page/signup', [AdminPageController::class, 'signup'])->name('admin_page_signup')->middleware('admin:admin');
    Route::post('/page/signup/update', [AdminPageController::class, 'signup_update'])->name('admin_page_signup_update')->middleware('admin:admin');

    Route::get('/subscriber/show', [AdminSubscriberController::class, 'show'])->name('admin_subscriber_show')->middleware('admin:admin');
    Route::get('/subscriber/send-email', [AdminSubscriberController::class, 'send_email'])->name('admin_subscriber_send_email')->middleware('admin:admin');
    Route::post('/subscriber/send-email-submit', [AdminSubscriberController::class, 'send_email_submit'])->name('admin_subscriber_send_email_submit')->middleware('admin:admin');

    Route::get('/amenity/view', [AdminAmenityController::class, 'index'])->name('admin_amenity_view')->middleware('admin:admin');
    Route::get('/amenity/add', [AdminAmenityController::class, 'add'])->name('admin_amenity_add')->middleware('admin:admin');
    Route::post('/amenity/store', [AdminAmenityController::class, 'store'])->name('admin_amenity_store')->middleware('admin:admin');
    Route::get('/amenity/edit/{id}', [AdminAmenityController::class, 'edit'])->name('admin_amenity_edit')->middleware('admin:admin');
    Route::get('/amenity/delete/{id}', [AdminAmenityController::class, 'delete'])->name('admin_amenity_delete')->middleware('admin:admin');
    Route::post('/amenity/update/{id}', [AdminAmenityController::class, 'update'])->name('admin_amenity_update')->middleware('admin:admin');

});

// front
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about',[AboutController::class,'index'])->name('about');
Route::get('/blog/{id}',[BlogController::class,'single'])->name('blog');
Route::post('/subscriber/send-email',[SubscribeController::class,'send_email'])->name('subscribe_send_email');
Route::get('/subscriber/verify/{email}/{token}',[SubscribeController::class,'verify'])->name('subscribe_verify');

// test cho giao dien login nguoi dung
Route::get('/login',[HomeController::class,'login']);




