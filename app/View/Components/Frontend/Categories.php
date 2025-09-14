<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Categories extends Component
{
    public $categories;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
        $this->categories = \App\Models\Category::select('slug', 'name')
            ->having('blogs_count', '>', 0)
            ->withCount('blogs')
            ->inRandomOrder()
            ->take(7)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.categories');
    }
}
