<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    //
    public function show(string $id)
    {
        //
        return view('frontend.photo.show', compact('id'));
    }

}
