<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index()
    {
        $categories = Category::select('image', 'slug')
            ->inRandomOrder()
            ->get();
        $blogs = \App\Models\Blog::select('image', 'slug', 'title', 'content', 'created_at', 'category_id', 'user_id')
            ->with('category:id,name', 'user:id,name')
            ->latest()
            ->take(6)
            ->get();
        $users = \App\Models\User::select('name', 'image', 'designation')
            ->inRandomOrder()
            ->take(4)
            ->get();

        $photos = \App\Models\Photo::select('image', 'description', 'title', 'category_id', 'slug')
            ->inRandomOrder()
            ->with('category:id,name,slug')
            ->take(7)
            ->get();
        $photo_categories = Category::select('name', 'slug')
            ->whereIn('id', $photos->pluck('category_id'))
            ->inRandomOrder()
            ->get();
        $skills = \App\Models\Skill::select('title', 'percentage')
            ->inRandomOrder()
            ->take(4)
            ->get();
        $faker = \Faker\Factory::create()->sentence(10);
        return view('frontend.index', compact('categories', 'blogs', 'users', 'faker', 'photos', 'photo_categories', 'skills'));
    }
}
