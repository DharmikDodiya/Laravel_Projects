<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    //===============================================one to one relationship=============================

    // public function blog(){
    //     return $this->hasOne(Blog::class);
    // }
    
        
        public function blog(){
            return $this->hasMany(Blog::class);
        }

        public function owner(){
            return $this->hasOneThrough(Owner::class,Blog::class);
        }

        // public function owner(){
        //     return $this->hasOneThrough(Owner::class,Blog::class);
        // }
    
}
