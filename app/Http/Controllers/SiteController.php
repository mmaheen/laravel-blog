<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index()
    {
        $categories = \App\Models\Category::select('image','slug')->inRandomOrder()->get();
        $blogs = \App\Models\Blog::select('image','slug','title','content','created_at')->inRandomOrder()->take(6)->get();
        return view('frontend.index', compact('categories', 'blogs')); 
    }
}
