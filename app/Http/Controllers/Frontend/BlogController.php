<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogs = Blog::select('title', 'slug', 'image', 'created_at', 'content', 'category_id', 'user_id')
            ->with(['category:id,name', 'user:id,name'])
            ->inRandomOrder()
            ->where('is_published', true)
            ->paginate(6);

        $tags = \App\Models\Tag::select('slug', 'name')
            ->inRandomOrder()
            ->take(10)
            ->get();
        return view('frontend.blog.index', compact('blogs', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        //
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $recent_blogs = Blog::select('title', 'slug', 'image', 'created_at')
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        return view('frontend.blog.show', compact('blog', 'recent_blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
