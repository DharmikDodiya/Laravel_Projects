<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showdata(){
        $post =  Post::find(1);

        foreach($post->comments as $comment){
            echo $comment .'<br>';
        }
    }

    public function showpostone(){
        $post =  Post::find(1);
        return $post;
    }


    public function gettags(){
        $post = Post::first();
        return $post->tags;
    }



}
