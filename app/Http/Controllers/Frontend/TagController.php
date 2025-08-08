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
        $blogs = $tag->blogs()
            ->select('image', 'title', 'content', 'slug', 'user_id')
            ->with('user')
            ->paginate(6);
        $other_tags = Tag::where('slug', '!=', $tag->slug)->inRandomOrder()->take(15)->get();
        return view('frontend.tag.show', compact('tag', 'blogs', 'other_tags'));
    }
}
