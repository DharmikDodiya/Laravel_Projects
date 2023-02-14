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


    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        //login code
        if(Auth::attempt($request->only('email','password'))){
            //return $request; 
            return redirect('addstudent');
        }
        else{
            return $request; 
        }

    }

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

        return redirect('register')->withErrors('Error');
    }
    
    // public function register(Request $request){
    //         $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|unique:users|email',
    //         'password' => 'required|same:password_confirmation|min:6',
    //         'password_confirmation' => 'required',
    //     ]);

    //     $data = $request->all();
    //     $createUser = $this->create($data);

    //     $token = Str::random(64);


    //     UserVerify::create([
    //         'user_id' => $createUser->id,
    //         'token' => $token
    //     ]);

    //     Mail::send('emails.emailVerificationEmail', ['token' => $token], function($message) use($request){
    //         $message->to($request->email);
    //         $message->subject('Email Verification Mail');
    //     });

        
       
    //   return redirect("home")->withSuccess('Great! You have Successfully loggedin');
    // }
       
    



    public function home()
    {
        if(Auth::check()){
            return view('home');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

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
                return redirect()->route('login')->with('message', $message);
            } 
     
    }


    public function forgetPassword_View(){
        return view('auth.forgetpassword');
    }

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
                return back()->with('success','Please Check Your Mail And Reset Your Password');
            }
            else{
                return back()->with('error','Email Is Not Exists!');
            }
            
        }
        catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }

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

    public function resetPassword(Request $request){
        
        
        $request->validate([
            'password' => 'required|same:password_confirmation'
        ]);
        $user = User::where('email',$request->email)->first();
       // dd($user);
        $user->update(['password' => Hash::make($request->password)]);

        //PasswordReset::where('email',$user->email)->delete();
        return "<h2>Your password has Been Reset SuccessFully</h2>";
    }
    
}
