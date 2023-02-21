<?php


namespace App\Http\Traits;
use App\Http\Controllers\UserController;

trait ErrorMessage{
    public function ErrorResponse($validateUser){
        return response()->json([
            'status' => 403,
            'message' => 'validation error',
            'errors' => $validateUser->errors()
        ], 403);
    }

    public function DataNotFound(){
        return response()->json([
            'status' => 401,
            'message' => 'Data Not Found'
        ],401);
    }
}
?>