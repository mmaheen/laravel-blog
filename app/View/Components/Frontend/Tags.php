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
        $this->tags = \App\Models\Tag::select('slug', 'name')
            ->inRandomOrder()
            ->take(10)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.tags');
    }
}
