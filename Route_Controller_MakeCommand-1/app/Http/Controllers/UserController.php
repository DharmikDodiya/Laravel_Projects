<?php

namespace App\Http\Controllers;
use App\Models\Employee;

use Illuminate\Http\Request;

class UserController extends Controller
{

    function UserList(){
        return "Blog List";
    }

    function addUser(){
        return "Blog Is Added";
    }

    function UpdateUser(){
        return "BLog Is Uopdate";
    }
    function loadData(){
        // return view("view",["names"=>['dharmik','sarman','hitesh']]); //passing array
        $data = ['dharmik','sarman','hitesh'];
        //    return view("view",["name"=>'Dharmik']); //passing one parameter  
           return view("view",["names"=>$data]);
    }

    function getData(Request $req){
       return $req->input();
    }

   public function getDataDatabase(){
        return Employee::all();
       
    }
}

    


