<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Blog extends Controller
{
    function BlogList(){
        return "Blog List";
    }

    function addBlog(){
        return "Blog Is Added";
    }

    function UpdateBlog(){
        return "BLog Is Uopdate";
    }
}
