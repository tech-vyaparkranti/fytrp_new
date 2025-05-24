<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\EnquiryFormController;

Route::controller(HomeController::class)->group(function () {
Route::get('/', 'index')->name('index');
// Route::get('/index', 'index')->name('index');
// Route::get('/index2', 'index2')->name('index2');
// Route::get('/index3', 'index3')->name('index3');
Route::get('/about', 'about')->name('about');
Route::get('/destinations','destination')->name('destination');
Route::get('/hotels','hotels')->name('hotels');
Route::get('/hotel-detsils/{slug}','hotelDetails')->name('hotelDetails');

// Route::get('/destinationdetails','destinationdetails')->name('destinationdetails');
Route::get("destination/{destination_slug}",[HomeController::class,"destinationDetailpage"])->name("destinationDetailpage");

Route::get('/packages','tour')->name('tour');
// Route::get('/tourdetails','tourdetails')->name('tourdetails');
Route::get("package/{slug}",[HomeController::class,"tourDetailpage"])->name("tourDetailpage");
Route::get('/blogs','blog')->name('blog');
// Route::get('/blogdetails','blogdetails')->name('blogdetails');
Route::get("blog/{slug}",[HomeController::class,"blogdetail"])->name("blogdetail");
Route::get('/contact','contact')->name('contact');
Route::get('/privacypolicy','privacypolicy')->name('privacypolicy');
Route::get('/CancellationRefundPolicy','CancellationRefundPolicy')->name('CancellationRefundPolicy');

Route::get('/termsConditions','termsConditions')->name('termsConditions');

Route::get('/gallery','galleryPages')->name('galleryPages');

Route::get('/our-service','ourServices')->name('destinations');
Route::match(['get', 'post'], '/filter-packages', [HomeController::class, 'filterPackages'])->name('filterPackages');



Route::post("contact-us-form",[ContactUsController::class,"saveContactUsDetails"])->name("saveContactUsDetails");

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments', [CommentController::class, 'showComments'])->name('comments.show');

Route::post('subscribe-news-letter',[NewsLetterController::class,"subscribeNewsLetter"])->name("subscribeNewsLetter");

Route::post('enquiry-form',[EnquiryFormController::class,"enquiryDetails"])->name("saveEnquiryFormData");





});

include_once "adminRoutes.php";