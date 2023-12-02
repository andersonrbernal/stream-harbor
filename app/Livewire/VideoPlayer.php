<?php

namespace App\Livewire;

use App\Models\Video;
use Livewire\Component;

/**
 * Class VideoPlayer
 *
 * Represents a Livewire component for rendering and interacting with a video player.
 */
class VideoPlayer extends Component
{
    /**
     * The video model instance.
     *
     * @var Video
     */
    public Video $video;

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.video-player');
    }

    /**
     * Mount the component with the given video.
     *
     * @param Video $video
     * @return void
     */
    public function mount(Video $video)
    {
        $this->video = $video;
    }

    /**
     * Records a like or dislike interaction for the video based on the user's previous interaction.
     *
     * This method checks if the user is authenticated and if the video has not been liked by the user.
     * If the conditions are met, it marks the video as liked by the user.
     *
     * @return void
     */
    public function likeOrDislike(): void
    {
        if (!auth()->check()) {
            redirect()->route('auth.login', ['locale' => app()->getLocale()]);
            return;
        }

        $userId = auth()->id();

        if (auth()->check() && !$this->video->isLikedByUser($userId)) {
            $this->video->like($userId);
        } else {
            $this->video->dislike($userId);
        }
    }

    /**
     * View the video.
     *
     * This method checks if the user is authenticated and if the video has not been viewed by the user.
     * If the conditions are met, it marks the video as viewed by the user.
     *
     * @return void
     */
    public function view()
    {
        $userId = auth()->id();

        if (auth()->check() && !$this->video->isViewedByUser($userId)) {
            $this->video->view($userId);
        }
    }
}
