<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    
    public function index(){
        $data = [
            'title' => 'Test Email From hello@example.com',
            'body' => 'This Is the Body Of Mail'
        ];

        Mail::to('dharmik@gmail.com')->send(new TestMail($data));
        dd('Email Send SuccessFully');
    }
}
