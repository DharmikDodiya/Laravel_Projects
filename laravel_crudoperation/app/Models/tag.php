<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
Relation::enforceMorphMap([
    'post'=>'App\Models\Post',
    'video'=>'App\Models\Video',
]);

class tag extends Model
{
    use HasFactory;

    
}
