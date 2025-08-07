<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name', 'slug', 'image'];

    public function blogs()
    {
        return $this->hasMany(\App\Models\Blog::class);
    }

    public function photos()
    {
        return $this->hasMany(\App\Models\Photo::class);
    }
}
