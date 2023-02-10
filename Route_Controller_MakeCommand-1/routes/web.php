<?php

use App\Http\Controllers\ProfileController;
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

// Route::get("users",[UserController::class,'loadData']);
Route::post("users",[UserController::class,'getData']);
Route::view("login",'login');

//==========================get Data database==============================
Route::get("user",[UserController::class,'getDataDatabase']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
