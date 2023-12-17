<?php

namespace App\Livewire;

use App\Models\Video;
use Livewire\Component;
use Urodoz\Truncate\TruncateService;

/**
 * Class TrendingVideoPlayer
 *
 * Component responsible for displaying the trending video player.
 */
class TrendingVideoPlayer extends Component
{
    protected TruncateService $truncateService;
    protected Video $video;

    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.trending-video-player', [
            'video' => $this->video,
            'description' => $this->truncateService->truncate($this->video->description, 240),
        ]);
    }

    /**
     * Returns the placeholder view for the TrendingVideoPlayer component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function placeholder()
    {
        return view('livewire.trending-video-player-placeholder');
    }

    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount(Video $video, TruncateService $truncateService)
    {
        $this->video = $video;
        $this->truncateService = $truncateService;
    }
}
