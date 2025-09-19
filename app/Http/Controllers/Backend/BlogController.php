<?php

namespace App\Http\Controllers\Backend;

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
        $blogs = Blog::select('slug', 'image', 'user_id', 'title', 'subtitle', 'description', 'is_published', 'category_id', 'created_at')
            ->with('user:id,name,image', 'category:id,name')
            ->orderBy('created_at', 'desc')
            ->get();
        return view("backend.blog.index", compact('blogs'));
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
    public function show(string $id)
    {
        //
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
    public function destroy(string $slug)
    {
        //
        try {
            $blog = Blog::where('slug', $slug)->firstOrFail();
            if ($blog->image != null) {
                $image_path = public_path('uploads/blogs/' . $blog->image);
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            $blog->delete();
            session()->flash('success', 'Blog deleted successfully.');
            return redirect()->route('dashboard.blogs.index');
        } catch (\Exception $error) {
            return redirect()->route('dashboard.blogs.index')->with('error', $error->getMessage());
        }
    }
}
