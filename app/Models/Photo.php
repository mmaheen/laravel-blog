<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = ['title', 'description', 'user_id', 'category_id', 'image'];
}
