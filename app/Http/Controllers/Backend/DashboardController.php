<?php

namespace App\Http\Controllers\Backend;

use App\Models\Blog;
use App\Models\User;
use App\Models\Photo;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        $total_blogs = Blog::count();
        $total_photos = Photo::count();
        $total_users = User::count();
        $total_categories = Category::count();

        $blogs = Blog::with('user:id,name,image', 'category:id,name')
            ->latest()
            ->take(4)
            ->get();

        $photos = Photo::with('user:id,name,image', 'category:id,name')
            ->latest()
            ->take(4)
            ->get();

        $random_users = User::select('id', 'name', 'image')
            ->inRandomOrder()
            ->take(4)
            ->get();
        return view('backend.dashboard', compact('total_blogs', 'total_photos', 'total_users', 'total_categories', 'blogs', 'photos', 'random_users'));
    }
}
