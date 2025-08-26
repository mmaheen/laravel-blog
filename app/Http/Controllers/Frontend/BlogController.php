<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogs = Blog::select('slug', 'title', 'image', 'created_at', 'user_id', 'category_id', 'description')
            ->with(['user:id,name', 'category:id,name'])
            ->inRandomOrder()
            ->paginate(6);
        return view('frontend.blog.index', compact('blogs'));
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
        return view('frontend.blog.show', compact('blog'));
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

    public function blogsByDate($date)
    {
        $blogs = Blog::whereDate('created_at', $date)
            ->select('slug', 'title', 'image', 'created_at', 'user_id', 'category_id', 'description')
            ->with(['user:id,name', 'category:id,name'])
            ->inRandomOrder()
            ->paginate(6);
        return view('frontend.blog.index', compact('blogs'));
    }
}
