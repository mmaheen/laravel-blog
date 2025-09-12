<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = ['title', 'image', 'category_id', 'user_id', 'description', 'slug'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
