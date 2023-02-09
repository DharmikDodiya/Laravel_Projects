<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\Blogs;
use App\Http\Controllers\indexController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SingerController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\VideoController;
use App\Models\Owner;
use App\Models\song;

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


// Route::get('/index', function () {
//     return view('index');
// });

Route::get('addstudent',[StudentController::class,'index'])->name('addstudent');
Route::post('/store',[StudentController::class,'store']);

Route::get('show',[StudentController::class,'show']);

Route::get('/delete/{id}',[StudentController::class,'destroy']);

Route::get('/edit/{id}',[StudentController::class,'edit'])->name('edit');
Route::post('/update/{id}',[StudentController::class,'update'])->name('update');

Route::get('/forcedelete/{id}',[StudentController::class,'forcedelete'])->name('forcedelete');

Route::get('restore',[StudentController::class,'deletedDataShow'])->name('restore');

Route::get('restoredata/{id}',[StudentController::class,'restoreData'])->name('restoredata');


Route::get('restoreall',[StudentController::class,'restoreAll'])->name('restoreall');

Route::get('relation/{id}',[StudentController::class,'relation'])->name('relation');

//=================================================Blog Routes===================================================

Route::get('list',[Blogs::class,'list'])->name('list');



Route::get('showcategory/{id}',[Blogs::class,'show_category'])->name('showcategory');


Route::get('addblog/{id}',[Blogs::class,'addblog'])->name('addblog');


Route::get('showblogdata/{id}',[Blogs::class,'showBlogdata'])->name('showblogdata');


//===============================================category Routes===============================================

Route::get('addcategory',[categoryController::class,'addCategory'])->name('addcategory');

Route::get('showblog/{id}',[categoryController::class,'showblog'])->name('showblog');


Route::get('index/{id}',[indexController::class,'index'])->name('index');

Route::get('showcategorydata/{id}',[categoryController::class,'showCategory'])->name('showcategorydata');

Route::get('indexdata/{id}',[indexController::class,'indexdata'])->name('indexdata');



Route::get('addowner/{id}',[OwnerController::class,'addOwner'])->name('addowner');


//==========================get Owner name based on category id using hasOneThrought ===================================
Route::get('getowner/{id}',[OwnerController::class,'get_Owner'])->name('getowner');


//===================================Many To Many Routes========================================================

Route::get('addsong',[SongController::class,'addSong'])->name('addsong');

// Route::get('addsinger/{id}',[SingerController::class,'addSinger'])->name('addsinger');

Route::get('addsinger',[SingerController::class,'addSinger'])->name('addsinger');

Route::get('showsong/{id}',[SongController::class,'showSong'])->name('showsong');

Route::get('showsinger/{id}',[SingerController::class,'showSinger'])->name('showsinger');


// Route::get('addsinger',[SingerController::class,'addSinger'])->name('addsinger');
// Route::post('/store',[SingerController::class,'storesinger']);



//===================================Polymorphic relationship One To One  ========================================================

Route::get('showpostone',[PostController::class,'showpostone'])->name('showpostone');

Route::get('showvideoone',[VideoController::class,'showvideoone'])->name('showvideoone');


//===================================Polymorphic relationship One To Many ========================================================

Route::get('showpostcomment',[PostController::class,'showdata'])->name('showpostcomment');

Route::get('showvideocomment',[VideoController::class,'showdata'])->name('showvideocomment');

//==================================Polymorphic Relationship One Of Many==========================================================

Route::get('gettags',[PostController::class,'gettags'])->name('gettags');

//==================================Polymorphic Relationship Many Of Many==========================================================

Route::get('many-to-many',[PostController::class,'Manytomany'])->name('many-to-many');