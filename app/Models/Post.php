<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $table="accounts";
    protected $fillable = [
        'title',
        'content',
        'author',
    ];

    
}
