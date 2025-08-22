<?php

namespace App\View\Components\Frontend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tags extends Component
{
    public $tags;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
        $this->tags = \App\Models\Tag::select('name', 'slug')
            ->inRandomOrder()
            ->take(10)
            ->get(); // Fetch all tags from the database
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.tags');
    }
}
