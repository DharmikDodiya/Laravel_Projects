<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\PaymentService\Paypal;

use App\Http\Controllers\UserController;

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

//=======================Controller Route===============================
Route::get('/list',[UserController::class,'BlogList']);
Route::get('/add',[UserController::class,'addBlog']);
Route::get('/update',[UserController::class,'UpdateBlog']);


//=====================Group Route Controller===========================

Route::controller(UserController::class)->group(function(){
Route::get('/list','UserList');
Route::get('/add','addUser');
Route::get('/update','UpdateUser');


});

Route::view('about','/about');
Route::view('view','/view');

//======================controller pass parameter=========================

// Route::get('/{name}',function($name){
//     return view('view',['name'=>$name]);
// });

//========================controler pass method============================

Route::get("users",[UserController::class,'loadData']);