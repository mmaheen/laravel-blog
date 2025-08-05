<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index()
    {
        $categories = \App\Models\Category::select('image','slug')->inRandomOrder()->get();
        return view('frontend.index', compact('categories')); 
    }
}
