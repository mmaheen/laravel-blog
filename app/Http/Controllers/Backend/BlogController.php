<?php

namespace App\Http\Controllers\Backend;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogs = Blog::select('id', 'slug', 'image', 'user_id', 'title', 'subtitle', 'description', 'is_published', 'category_id', 'created_at')
            ->with('user:id,name,image', 'category:id,name', 'tags:id,name')
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
        $categories = Category::select('id', 'name')
            ->orderBy('name', 'asc')
            ->get();
        $tags = Tag::select('id', 'name')
            ->orderBy('name', 'asc')
            ->get();
        return view('backend.blog.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'is_published' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'title.required' => 'Please enter a title for the blog.',
            'description.required' => 'Please enter a description for the blog.',
            'category_id.required' => 'Please select a category for the blog.',
            'is_published.required' => 'Please specify if the blog is published.',
        ]);
        try {
            $image_name = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $image_name = time() . '_blog_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/blogs/'), $image_name);
            }
            $blog = new Blog();
            $blog->user_id = Auth::user()->id;
            $blog->title = $request->title;
            $blog->subtitle = $request->subtitle;
            $blog->slug = Str::slug($request->title) . '-' . uniqid();
            $blog->description = $request->description;
            $blog->category_id = $request->category_id;
            $blog->is_published = $request->is_published;
            $blog->image = $image_name;
            $blog->save();

            // Sync tags
            $blog->tags()->sync($request->tags ?? []);

            return redirect()->route('dashboard.blogs.index')->with('success', 'Blog created successfully.');

        } catch (\Exception $e) {
            return redirect()->route('dashboard.blogs.index')->with('error', 'Failed to create blog. ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        //
        $blog = Blog::where('slug', $slug)
            ->with('user:id,name,image', 'category:id,name', 'tags:id,name', 'comments.user:id,name,image')
            ->withCount('comments')
            ->first();
        return view('backend.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        //
        $blog = Blog::where('slug', $slug)
            ->with('tags:id,name')
            ->firstOrFail();
        $categories = Category::select('id', 'name')
            ->orderBy('name', 'asc')
            ->get();
        $tags = Tag::select('id', 'name')
            ->orderBy('name', 'asc')
            ->get();
        return view('backend.blog.edit', compact('blog', 'categories', 'tags'));
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

            // Sync tags
            $blog->tags()->sync($request->tags ?? []);

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
