<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\PaymentService\Paypal;
use App\Http\Controllers\Blog;


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

// Route::get('/', function (\App\PaymentService\Paypal $payment) {
//     dump($payment->Pay());

// });

// Route::get('/', function (\App\PaymentService\PaymentServiceInterface $payment) {
//     return $payment->checkout();

// });

// Route::get('/', function () {
//     return Facades\App\PaymentService\PaymentServiceInterface::checkout();
// });
// Route::get('/', function () {
//     // return "Dharmik";
//     return \App\Facades\PaymentFacade::checkout();
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/', function () {
//     dd(app(\App\PaymentService\Paypal::class),app(
//     \app\App\PaymentService\Paypal::class));
// });

// Route::get('/list',[Blog::class,'BlogList']);
// Route::get('/add',[Blog::class,'addBlog']);
// Route::get('/update',[Blog::class,'UpdateBlog']);

Route::controller(Blog::class)->group(function(){
Route::get('/list','BlogList');
Route::get('/add','addBlog');
Route::get('/update','UpdateBlog');


});

Route::view('about','/about');
Route::view('view','/view');

Route::get('/{name}',function($name){
    return view('welcome',['name'=>$name]);
});