<?php

namespace App\View\Components\Frontend;

use Closure;
use App\Models\Blog;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class RecentBlog extends Component
{
    public $blogs;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->blogs = Blog::select('title', 'slug', 'image', 'created_at')
            ->where('is_published', true)
            ->latest()
            ->take(5)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.recent-blog');
    }
}
