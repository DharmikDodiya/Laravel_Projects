<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


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
    return view('index');
});


// Route::get('/index', function () {
//     return view('index');
// });

Route::get('addstudent',[StudentController::class,'index']);
Route::post('/store',[StudentController::class,'store']);

Route::get('show',[StudentController::class,'show']);

Route::get('/delete/{id}',[StudentController::class,'destroy']);

Route::get('/edit/{id}',[StudentController::class,'edit']);