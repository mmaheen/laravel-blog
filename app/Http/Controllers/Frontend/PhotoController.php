<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    //
    public function show(string $slug)
    {
        //
        $photo = Photo::where('slug', $slug)->firstOrFail();
        return view('frontend.photo.show', compact('photo'));
    }

}
