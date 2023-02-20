<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register(Request $request){

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => ['required','email'],
            'password' => ['min:6','confirmed']
        ]);

        $user = User::create($validatedData);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        $token = $user->createToken("auth_token")->accessToken;
        return response(
            [
                'token' => $token,
                'user' => $user,
                'message' =>'User Created SuccessFully',
                'status' => 1
            ]
        );
    }

    public function login(Request $request){
        $validatedData = $request->validate([
            'email' => ['required','email'],
            'password' => 'required'
        ]);

        $user = User::where(['email' => $validatedData['email'],'password' => $validatedData['password']])->first();
        $token = $user->createToken("auth_token")->accessToken;
        return response(
            [
                'token' => $token,
                'user' => $user,
                'message' =>'Logged In SuccessFully',
                'status' => 1
            ]
        );
    }

    public function getUser($id){
        $user = User::find($id);
        if(is_null($user)){
            return response(
                [
                    'user' => null,
                    'message' =>'User Not Found',
                    'status' => 0
                ]
            );
        }
        else{
            return response(
                [
                    'user' => $user,
                    'message' =>'User Found',
                    'status' => 1
                ]
            );
        }
    }
    
}
