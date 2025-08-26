<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'image',
        'slug',
        'is_published',
        'user_id',
        'category_id',
    ];
}
