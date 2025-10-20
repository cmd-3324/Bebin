<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ChannelPage extends Component
{
    public $banner;
    public $avatar;
    public $name;
    public $subscribers;
    public $videosCount;

    public function __construct($banner = null, $avatar = null, $name = null, $subscribers = 0, $videosCount = 0)
    {
        $this->banner = $banner;
        $this->avatar = $avatar;
        $this->name = $name;
        $this->subscribers = $subscribers;
        $this->videosCount = $videosCount;
    }

    public function render()
    {
        return view('components.channel-page');
    }
}
