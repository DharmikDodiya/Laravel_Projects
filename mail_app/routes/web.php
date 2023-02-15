<?php

use App\Events\MessageNotification;
use Illuminate\Support\Facades\Route;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mailsend',function(){
    Mail::to('d@gmail.com')->send(new TestMail());
});

Route::get('/event', function () {
    event(new MessageNotification('This Is Our First BroadCast Message'));
});


Route::get('/listen', function () {
    return view('listen');
});