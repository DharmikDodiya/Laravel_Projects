<?php

namespace App\Http\Controllers;

//namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\UserVerify;
use App\Notifications\VerifyEmail;
use Exception;
use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Support\Facades\Mail;
use App\Models\PasswordReset;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

use Illuminate\Support\Str;




class AuthController extends Controller
{
    
    public function index(){
        return view('auth.login');
    }

    public function registerView(){
        return view('auth.register');
    }

//=============================user login =====================================
    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        //login code
        // if(Auth::attempt($request->only('email','password'))){ 
        //     return redirect('addstudent');
        // }
        if(Auth::attempt(['email' =>$request->email,'password' => $request->password , 'status' => 1])){
            return redirect('addstudent');
        }
        else{
            return back()->withError('These credentials do not match our records.');
        }

    }


//=============================user Register =====================================
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|same:password_confirmation',
            'password_confirmation' => 'required',
        ]);

        $token = Str::random(64);

       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'token' => $token,
        ]);

        $user->notify(new VerifyEmail($user));

        // if(Auth::attempt($request->only('email','password'))){
        //     return redirect('home');
        // }

        return redirect('success')->with('success','your message is send check your mail');
    }
    
    
    public function home()
    {
        if(Auth::check()){
            return view('home');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }



//=============================user Logout =====================================
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('');
    }

    public function create(array $data){

      return User::create([

        'name' => $data['name'],

        'email' => $data['email'],

        'password' => Hash::make($data['password'])

      ]);

    }


//=============================user Verify Accout =====================================

    public function verifyAccount($token)
    {
        $verifyUser = User::where('token', $token)->first();
  
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
                $verifyUser->status = 1;
                $verifyUser->email_verified_at = now();
                $verifyUser->token = '';
                $verifyUser->save();
                $message = "Your e-mail is verified. You can now login.";
                return redirect()->route('success')->with('success', 'your email is verified you can now login');
            } 
            else{
                return redirect()->route('error')->with('error', 'Your Email Is Already Verified!!! ');
            }
     
    }



//=============================user ForgetPassword View =====================================

    public function forgetPassword_View(){
        return view('auth.forgetpassword');
    }


//=============================user forgetPassword Code =====================================

    public function forgetPassword(Request $request){
        try{    
            $user = User::where('email',$request->email)->get();

            if(count($user) > 0){
                $token = Str::random(64);
                $domain = URL::to('/');
                $url = $domain.'/resetPassword?token='.$token."&email=".$request->email;

                $data['url'] = $url;
                $data['email'] = $request->email;
                $data['title'] = 'Password Reset';
                $data['body'] = 'please Click To below Link To Reset password';

                Mail::send('emails.forgetPasswordMail',['data'=>$data],function($message) use ($data){
                    $message ->to($data['email'])->subject($data['title']);
                });

                $datetime = Carbon::now()->format('Y-m-d H:i:s');

                PasswordReset::updateOrCreate(
                    ['email' => $request->email],
                    [
                        'email'=>$request->email,
                        'token' => $token,
                        'created_at' => $datetime 
                    ]
                );
                return redirect('success')->with('success','Please Check Your Mail And Reset Your Password');
            }
            else{
                return back()->with('error','Email Is Not Exists!');
            }
            
        }
        catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }



//=============================user ResetPassword View =====================================
    public function resetPasswordView(Request $request){
        $resetdata = PasswordReset::where('token',$request->token)->first();
        $resetdata = PasswordReset::all();
       
      // dd($resetdata['created_at']);
        if(isset($request->token) && count($resetdata) > 0){
            $user = User::where('email',$request->email)->first();

            return view('auth.resetPassword',['user' => $user]);

        }
        else{
            return view('404');
        }
    }


//=============================user ResetPassword Code =====================================

    public function resetPassword(Request $request){
        
        
        $request->validate([
            'password' => 'required|same:password_confirmation'
        ]);
        $user = User::where('email',$request->email)->first();
       // dd($user);
        $user->update(['password' => Hash::make($request->password)]);

        //PasswordReset::where('email',$user->email)->delete();
        return redirect('success')->with('success','your Password has Been Change Successfully');
    }


//======================================return success View==================================

    public function successView(){
        return view('auth.success')->with('success','Please Check Your Mail and Verify It');
    }

    public function errorView(){
        return view('auth.error')->with('error','sorry Your mail Is Not Send ');
    }

    
}
