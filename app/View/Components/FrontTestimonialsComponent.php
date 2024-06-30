<?php

namespace App\View\Components;

use App\Models\Testmonial;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FrontTestimonialsComponent extends Component
{
    public $testimonials;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->testimonials = Testmonial::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front-testimonials-component');
    }
}
