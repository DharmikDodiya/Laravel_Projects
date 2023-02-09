<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps=false;
    protected $table = "students";

    protected $fillable = ['studentname','email','contactno','dateofbirth','gender','password'];

    protected $hidden = ['password'];

    public function department(){
        return $this->hasMany(Student::class);
    }

    //Mutator And Accessor
    //============================================old Way=======================================================
    // public function setStudentnameAttribute($value){
    //     $this->attributes['studentname'] = ucwords($value);
    // }


    // public function getDateOfBirthAttribute($data){
    //     return date("d-M-Y",strtotime($data));
    // }

     //============================================New Way=======================================================

    protected function StudentName() : Attribute{
        return Attribute::make(
            get : fn($value) => strtoupper($value),
                set :fn($value) => strtolower($value),
        );
    }

    protected function dateOfBirth(): Attribute
    {
        return new Attribute(
            get: fn ($value) => date('d-M-Y',strtotime($value)),
                set: fn ($value) => date('y-m-d',strtotime($value)),
        );
    }

  
}
