<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Tag;

class Video extends Model
{
    use HasFactory;

    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }

    public function comments1(){
        return $this->morphOne(Comment::class,'commentable');
    }


    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }
}
