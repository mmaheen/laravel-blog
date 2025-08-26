<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'image',
        'slug',
        'is_published',
        'user_id',
        'category_id',
    ];

}
