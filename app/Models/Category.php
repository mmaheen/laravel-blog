<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name', 'slug', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
