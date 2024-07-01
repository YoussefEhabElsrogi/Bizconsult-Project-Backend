<?php

namespace App\View\Components;

use App\Models\Team;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FrontTeamsComponent extends Component
{
    public $teams;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->teams = Team::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front-teams-component');
    }
}
