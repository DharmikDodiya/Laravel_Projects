<?php

namespace App\Http\Controllers;

use App\Models\singer;
use App\Models\song;
use Illuminate\Http\Request;

class SingerController extends Controller
{
    public function addSinger(){
        $singer = new singer();
        $singer->name = "dharmik";
        $singer->save();
        $songids = [1,3,5];
        $singer->songs()->attach($songids);

        // return view('addsinger');
    }


    public function storesinger(Request $request){
        $singer = new singer();
        $singer->name = $request->name;

        $singer->save();

        return redirect('addsinger');
    }

    public function showsinger($id){
        $singer = song::find($id)->singers;
        return $singer;
    }
}
