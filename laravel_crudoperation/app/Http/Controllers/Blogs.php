<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use Illuminate\Http\Request;

class Blogs extends Controller
{

    public function list(){
        DB::table('blogs')->orderBy('id')->chunk(5,function($blogs){
            echo "Chunk Of Data <br>";
            foreach($blogs as $blog){
                echo $blog->city;
                echo "<br>";
            }
            return false;
        });
    }


    public function show_category($id){
        $category = Blog::find($id)->category;
        return view('showcategory',['category'=>$category]);
    }

    public function addblog($id){
        $category = category::find($id);
        $blog = new Blog();
        $blog->blogname = 'news';
        $blog->blog_description = 'news news news';
        $blog->email = 'news@gmail.com';
        $blog->city = 'india';
        $category->Blog()->save($blog);
    }


    public function showBlogdata($id){
        $blog = category::find($id)->Blog;
        return $blog;
    }


}
