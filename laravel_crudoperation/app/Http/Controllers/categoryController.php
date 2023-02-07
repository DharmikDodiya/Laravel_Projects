<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\category;
 
use Illuminate\Http\Request;

class categoryController extends Controller
{
    
    public function showblog($id){
            $blog = category::find($id)->Blog;
            return view('showblog',['blog'=>$blog]);
        
    }



    public function addCategory(){
        $category = new category();
        $category->category_name = 'political';
        $category->save();
    }


    public function showCategory($id){
        $category = Blog::find($id)->category;
        return $category;
    }

  

}
