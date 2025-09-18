<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        //In clients section
        $categories = Category::select('slug', 'image')
            ->inRandomOrder()
            ->get();

        //In skills section
        $skills = \Illuminate\Support\Facades\DB::table('skills')
            ->select('title', 'percentage')
            ->inRandomOrder()
            ->get();

        //In photos section
        $photos = \App\Models\Photo::select('slug', 'image', 'title', 'description', 'category_id')
            ->with('category:id,name,slug')
            ->inRandomOrder()
            ->take(9)
            ->get();
        $photo_categories = Category::select('name', 'slug')
            ->whereIn('id', $photos->pluck('category_id'))
            ->inRandomOrder()
            ->get();

        //In Recent blog section
        $recent_blogs = \App\Models\Blog::select('slug', 'title', 'image', 'created_at', 'user_id', 'category_id')
            ->with(['user:id,name', 'category:id,name'])
            ->where('is_published', true)
            ->latest()
            ->take(6)
            ->get();
        return view('frontend.index', compact('categories', 'skills', 'photos', 'photo_categories', 'recent_blogs'));
    }
}
