<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Collection;

class VideoCard extends Component
{


    public function __construct()
    {

    }

    public function render()
    {

        return view('components.video-card');
    }
}
