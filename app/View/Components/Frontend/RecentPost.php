<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RecentPost extends Component
{
    public $blogs;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
        $this->blogs = \App\Models\Blog::select('title', 'slug', 'image', 'created_at')
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
        return view('components.frontend.recent-post');
    }
}
