<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VerificationForm extends Component
{
    /**
     * Create a new component instance.
     */
    // protected $action;
    public function __construct()
    {
        // $this->action =$action;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.verification-form');
    }
}
