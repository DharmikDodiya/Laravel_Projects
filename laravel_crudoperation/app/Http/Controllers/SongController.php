<?php

namespace App\Http\Controllers;
use App\Models\song;
use App\Models\singer;

use Illuminate\Http\Request;

class SongController extends Controller
{
    public function addSong(){
        $song = new song();
        $song->titlename = "lagiyo prit no rang";
        $song->save();
    }
//get song by singer id

    public function showSong($id){
        $song = singer::find($id)->songs;
        return $song;
    }
}
