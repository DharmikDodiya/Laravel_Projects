<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Controllers\UserController as ControllersUserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Http\Traits\ErrorMessage;


class UserController extends BaseController
{
    use ErrorMessage;

//=================================User Register ===================================================
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
              
                $error = $this->ErrorResponse($validateUser);
                return $error;
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'User Created Successfully',
                'data' => $user,
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

//=================================User Login ===================================================
    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                $error = $this->ErrorResponse($validateUser);
                return $error;
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => 200,
                'message' => 'User Logged In Successfully',
                'data' => $user,
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

//=================================User Update ===================================================

    public function update(Request $request, User $user){
        $input = $request->all();
        $validateUser = Validator::make($input, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);



        if($validateUser->fails()){
            $error = $this->ErrorResponse($validateUser);
            return $error;    
        }
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->save();
        
        return response()->json([
            'status' => 200,
            'message' => 'Data Updated',
            'data' => $user,
        ],200);

    }

//=================================All User Data Dispaly ===================================================

    public function index(){
        $user = User::all();
        if (is_null($user)) {
            $error = $this->DataNotFound();
            return $error;
        }
        else{
        return response()->json([
            'status' => 200,
            'message' => 'All User Data Fetched Successfully',
            'data' => $user,
        ], 200);
        }
    }

//=================================Display UserData Using Specific Id ===================================================
    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            $error = $this->DataNotFound();
            return $error;
        }
        else{
        return response()->json([
            'status' => 200,
            'message' => 'User Data Fetched Successfully',
            'data' => $user,
        ], 200);

        }
    }

//=================================User Delete ===================================================

    public function destroy($id){
        $user = User::find($id);
       
        if(is_null($user)){
            $error = $this->DataNotFound();
            return $error;
        }
        else{
            $user->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Data Deleted Successfully',
            ],200);
        }
    }

}
