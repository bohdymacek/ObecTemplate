<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Error extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.layouts.error');
    }
}