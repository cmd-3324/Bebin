<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\ChartService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class VerificationForm extends Component
{
    /**
     * Create a new component instance.
     */
    protected $action ='POST';
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
    protected function timedelay(){
        //
}
    public function sendCode() {



}
}
