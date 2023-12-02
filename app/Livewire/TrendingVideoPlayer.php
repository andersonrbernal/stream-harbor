<?php

namespace App\Livewire;

use App\Models\Video;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

/**
 * Class TrendingVideoPlayer
 *
 * Component responsible for displaying the trending video player.
 */
class TrendingVideoPlayer extends Component
{
    public Video $video;

    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.trending-video-player');
    }

    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount(Video $video)
    {
        $this->video = $video;
    }
}
