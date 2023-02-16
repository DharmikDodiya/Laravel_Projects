<?php

use App\Helpers\Custom;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\Blogs;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SingerController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\VideoController;
use App\Jobs\SendTestMailJob;
use App\Models\Blog;
use App\Models\Owner;
use App\Models\song;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Psy\Readline\Hoa\Autocompleter;
use Whoops\Run;
use App\Http\Controllers\FileUpload;


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


// Route::post('login',function(){
//     return "done";
// })->name('login');

// Route::group(['middleware'=>['guard']],function () {
//     Route::get('/', function () {
//         return view('login');
//     });
//     Route::post('login',function(){
//         return redirect()->route('addstudent');
//     })->name('login');

//     Route::get('no-access',function(){
//         return "not access this page vai group";
//     })->name('no-access');
//     // Route::get('addstudent',[StudentController::class,'index'])->name('addstudent');
    
// });
// Route::get('/', function () {
//         return view('login');
//     });

    Route::get('no-access',function(){
                return "not access this page vai group";
            })->name('no-access');


//=====================================================middleware practice=============================================



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


Route::get('list',[Blogs::class,'list'])->name('list')->middleware('checkid')->middleware('guard');

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

//====================================Middleware Route==============================================================================

// Route::get('/login', function () {
//             return view('login');
//         });
Route::get('loginid',function(){
    session()->put('user_id',1);
    return redirect('/');
});
Route::get('logout',function(){
    session()->forget('user_id');
    return redirect()->back();
});
Route::get('notaccess',function(){
    return "not access this page vai route";
})->name('no-access');


//====================================Response Route==============================================================================

Route::get('response',function(){
    return response()->json([
        'name' => 'Dharmik',
        'City' => 'Mangrol'
    ])->header('content-Type','text/html');
});


//====================================Response Route==============================================================================

// Route::get('/mailsend',function(){
//     Mail::to('ddd@gmail.com')->send(new TestMail());
//     dd('send mail SuccessFully');
// });

Route::get('/mailsend',[EmailController::class,'index']);


//=======================================Custome Authenication==============================================================

Route::get('login',[AuthController::class,'index'])->name('login');

Route::get('register',[AuthController::class,'registerView'])->name('register');

Route::post('login',[AuthController::class,'login'])->name('login');

Route::post('register',[AuthController::class,'register'])->name('register');



Route::get('logout',[AuthController::class,'logout'])->name('logout');

//Auth::routes(['verify'=>true]);

Route::get('home',[AuthController::class,'home'])->name('home')->middleware(['auth']);

Route::get('account/verify/{token}', [AuthController::class, 'verifyAccount'])->name('userverify'); 


Route::get('forgetpassword',[AuthController::class,'forgetPassword_View'])->name('forgetpassword');

Route::post('forgetpassword',[AuthController::class,'forgetPassword'])->name('forgetpassword');


Route::get('resetPassword',[AuthController::class,'resetPasswordView'])->name('resetPassword');


Route::post('resetPassword',[AuthController::class,'resetPassword'])->name('resetPassword');


Route::get('success',[AuthController::class,'successView'])->name('success');
Route::get('error',[AuthController::class,'errorView'])->name('error');


//=====================================================Queue & Job===========================================================

Route::get('jobmail',function(){
   
    $user = User::findOrFail(1);
    SendTestMailJob::dispatch($user)->delay(now()->addSeconds(5));


    echo "mail Send";
});

//======================================================using Helper Class===================================================

Route::get('helper',function(){
    echo message('Dharmik');
});

Route::get('helperclass',function(){
    echo Custom::uppercase('hello dharmik');
});


//======================================================using Traits Class===================================================

Route::get('traits',[AuthController::class,'dateFormat']);


//======================================================File storage Route===================================================

Route::get('/uploadfile', [FileUpload::class, 'createForm']);
Route::post('/uploadfile', [FileUpload::class, 'fileUpload'])->name('fileUpload');

Route::get('filedisplay',[FileUpload::class,'show']);

Route::get('downloadfile/{id}',[FileUpload::class,'downloadfile']);

Route::get('/delete/{id}',[FileUpload::class,'destroy']);