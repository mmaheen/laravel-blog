<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogs = Blog::select('slug', 'title', 'image', 'created_at', 'user_id', 'category_id', 'description')
            ->with(['user:id,name', 'category:id,name,slug'])
            ->where('is_published', true)
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
        $blog = Blog::where('slug', $slug)
            // ->with('comments.user')
            // ->withCount('comments')
            ->firstOrFail();
        // return $blog;
        return view('frontend.blog.show', compact('blog'));
    }

    /**
     * Display a listing of the resource by date.
     */
    public function blogsByDate($date)
    {
        $blogs = Blog::whereDate('created_at', $date)
            ->select('slug', 'title', 'image', 'created_at', 'user_id', 'category_id', 'description')
            ->with(['user:id,name', 'category:id,name,slug'])
            ->inRandomOrder()
            ->paginate(6);
        return view('frontend.blog.index', compact('blogs', 'date'));
    }

    /**
     * Display a listing of the resource by author.
     */
    public function blogsByAuthor($author)
    {
        $author = \App\Models\User::where('id', $author)->select('id', 'name')->firstOrFail();
        // return $author;
        $blogs = Blog::where('user_id', $author->id)
            ->select('slug', 'title', 'image', 'created_at', 'user_id', 'category_id', 'description')
            ->with(['user:id,name', 'category:id,name,slug'])
            ->inRandomOrder()
            ->paginate(6);
        return view('frontend.blog.index', compact('blogs', 'author'));
    }

    /**
     * Display a listing of the resource by category.
     */
    public function blogsByCategory($category)
    {
        $category = \App\Models\Category::where('slug', $category)->select('id', 'name')->firstOrFail();
        // return $category->id;
        $blogs = Blog::where('category_id', $category->id)
            ->select('slug', 'title', 'image', 'created_at', 'user_id', 'category_id', 'description')
            ->with(['user:id,name', 'category:id,name,slug'])
            ->inRandomOrder()
            ->paginate(6);
        return view('frontend.blog.index', compact('blogs', 'category'));
    }

    /**
     * Display a listing of the resource by tag.
     */
    public function blogsByTag($tag)
    {
        $tag = \App\Models\Tag::where('slug', $tag)->firstOrFail();
        $blogs = $tag->blogs()
            ->select('slug', 'title', 'image', 'created_at', 'user_id', 'category_id', 'description')
            ->with(['user:id,name', 'category:id,name,slug'])
            ->inRandomOrder()
            ->paginate(6);
        // return $blogs;
        return view('frontend.blog.index', compact('blogs', 'tag'));
    }
}
