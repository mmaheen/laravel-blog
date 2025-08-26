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
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        //
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('frontend.blog.show', compact('blog'));
    }

    /**
     * Display a listing of the resource by date.
     */
    public function blogsByDate($date)
    {
        $blogs = Blog::whereDate('created_at', $date)
            ->select('slug', 'title', 'image', 'created_at', 'user_id', 'category_id', 'description')
            ->with(['user:id,name', 'category:id,name'])
            ->inRandomOrder()
            ->paginate(6);
        return view('frontend.blog.index', compact('blogs'));
    }

    /**
     * Display a listing of the resource by author.
     */
    public function blogsByAuthor($author)
    {
        $blogs = Blog::where('user_id', $author)
            ->select('slug', 'title', 'image', 'created_at', 'user_id', 'category_id', 'description')
            ->with(['user:id,name', 'category:id,name'])
            ->inRandomOrder()
            ->paginate(6);
        return view('frontend.blog.index', compact('blogs'));
    }
}
