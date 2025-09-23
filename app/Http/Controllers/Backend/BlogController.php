<?php

namespace App\Http\Controllers\Backend;

use App\Models\Blog;
use App\Models\Category;
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
    public function edit(string $slug)
    {
        //
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $categories = Category::select('id', 'name')->get();
        return view('backend.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'is_published' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $blog = Blog::where('slug', $slug)->firstOrFail();
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($blog->image != null) {
                    $old_image_path = public_path('uploads/blogs/' . $blog->image);
                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }
                }
                $image = $request->file('image');
                $image_name = 'Updated' . time() . '_blog_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/blogs/'), $image_name);
                // Save new image name in the request data
                $blog->image = $image_name;
            }
            $blog->title = $request->title;
            $blog->subtitle = $request->subtitle;
            $blog->description = $request->description;
            $blog->category_id = $request->category_id;
            $blog->is_published = $request->is_published;
            $blog->update();
            return redirect()->route('dashboard.blogs.index')->with('success', 'Blog updated successfully.');

        } catch (\Exception $e) {
            return redirect()->route('dashboard.blogs.index')->with('error', 'Blog not found.');
        }
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
