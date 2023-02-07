<?php

namespace App\Http\Controllers;
use App\Models\category;
use App\Models\Blog;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index($id){
        $blog =Blog::find($id);
        return view('showblogcategory',['blog'=>$blog]);
      
    }


    public function indexdata($id){
        $category =category::find($id);
        // var_dump($category->category_name);
        // dd($category->blog);


        foreach($category->Blog as $blogs){
            echo $blogs;
        }
      
    }
}
