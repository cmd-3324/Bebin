<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class ChannelPage extends Component
{
    public $channel ="sdfsd"; // array or object with name, avatar, banner, id, etc.

    public function __construct()
    {
        // $this->channel = $channel;
    }

    public function render()
    {
        return view('components.channel-page');
    }
}
