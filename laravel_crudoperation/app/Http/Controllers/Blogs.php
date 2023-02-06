<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

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
}
