<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    //
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $blogs = $tag->blogs()->paginate(6);
        return view('frontend.tag.show', compact('tag', 'blogs'));
    }
}
