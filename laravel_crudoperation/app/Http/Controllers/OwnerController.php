<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\category;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function addOwner($id){
        $blog = Blog::find($id);
        $owner = new Owner();
        $owner->name = 'dharmik';
        $blog->Owner()->save($owner);
    }


    public function get_Owner($id){
        $owner = category::find($id)->Owner;
        return $owner;
    }
}
