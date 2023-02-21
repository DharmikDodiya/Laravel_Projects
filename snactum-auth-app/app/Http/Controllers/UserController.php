<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Controllers\UserController as ControllersUserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends BaseController
{
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
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
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

    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
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

    public function update(Request $request, User $user){
        $input = $request->all();
        $validateUser = Validator::make($input, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        if($validateUser->fails()){
            //return $this->sendError($validateUser->errors());
            return response()->json([
                'status' => false,
                'message' => 'validation error'
            ],401);     
        }
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = $input['password'];
        $user->save();
        
        //return $this->sendResponse(new UserController($user), 'data updated.');

        return response()->json([
            'status' => 'success',
            'message' => 'Data Updated',
            'data' => $user,
        ],200);

    }


    public function index(){
        $user = User::all();
        if (is_null($user)) {
            return response()->json([
                'status' => false,
                'message' => 'Data Not Found',
            ], 401);
        }
        else{
        return response()->json([
            'status' => true,
            'message' => 'All User Data Fetched Successfully',
            'data' => $user,
        ], 200);
        }
    }
    
    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json([
                'status' => false,
                'message' => 'Data Not Found',
            ], 401);
        }
        else{
        return response()->json([
            'status' => true,
            'message' => 'User Data Fetched Successfully',
            'data' => $user,
        ], 200);

        }
    }


    public function destroy($id){
        $user = User::find($id);
       
        if(is_null($user)){
            return response()->json([
                'status' => false,
                'message' => 'Data Not Found'
            ],401);
        }
        else{
            $user->delete();
            return response()->json([
                'status' => true,
                'message' => 'Data Deleted Successfully',
            ],200);
        }
    }

}
