<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\UserVerify;
use Illuminate\Support\Facades\Mail;

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
            return redirect('home');
        }

        return redirect('login')->withErrors('Login Details Are Not Valid');


    }

    // public function register(Request $request){
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|unique:users|email',
    //         'password' => 'required|same:password_confirmation',
    //         'password_confirmation' => 'required',
    //     ]);

    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password)
    //     ]);

    //     if(Auth::attempt($request->only('email','password'))){
    //         return redirect('home');
    //     }

    //     return redirect('register')->withErrors('Error');
    
    public function register(Request $request){
            $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|same:password_confirmation|min:6',
            'password_confirmation' => 'required',
        ]);

        $data = $request->all();
        $createUser = $this->create($data);

        $token = Str::random(64);


        UserVerify::create([
            'user_id' => $createUser->id,
            'token' => $token
        ]);

        Mail::send('emails.emailVerificationEmail', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Email Verification Mail');
        });
       
      return redirect("home")->withSuccess('Great! You have Successfully loggedin');
    }
       
    



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
        $verifyUser = UserVerify::where('token', $token)->first();
  
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
              
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
  
      return redirect()->route('login')->with('message', $message);
    }
    
}
