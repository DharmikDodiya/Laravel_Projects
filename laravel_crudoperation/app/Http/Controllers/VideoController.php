<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class VideoController extends Controller
{
    public function showdata(){
        $video = Video::find(1);
        return $video;
        foreach($video->comments as $comment){
            echo $comment.'<br>';
        }
    }


    public function showvideoone(){
        $videos = Video::find(1);

        return $videos;
    }
}
