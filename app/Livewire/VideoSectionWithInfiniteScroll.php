<?php

namespace App\Livewire;

use App\Models\Video;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * Class VideoSectionWithInfiniteScroll
 *
 * Component that displays a section of videos with infinite scroll functionality.
 */
class VideoSectionWithInfiniteScroll extends Component
{
    use WithPagination;

    protected int $videos_per_page = 10;
    protected Collection|LengthAwarePaginator $videos;
    protected $listeners = ['load-more' => 'loadMore'];

    /**
     * Mount the component.
     *
     * @param Collection|LengthAwarePaginator $videos The collection or paginator of videos to display.
     * @param int $videos_per_page The number of videos to display per page.
     * @return void
     */
    public function mount(
        Collection|LengthAwarePaginator $videos,
        int $videos_per_page = 6
    ): void {
        $this->videos_per_page = $videos_per_page;
        $this->videos = $videos;
    }

    /**
     * Load more videos.
     * It adds the new videos at the end of the list.
     *
     * @return void
     */
    public function loadMore(): void
    {
        $this->videos_per_page += 4;
        $this->videos = $this->getVideos();
    }

    /**
     * Get the videos to display.
     *
     * @return Collection|LengthAwarePaginator
     */
    protected function getVideos(): Collection|LengthAwarePaginator
    {
        return Video::paginate($this->videos_per_page);
    }

    /**
     * Render the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.video-section-with-infinite-scroll', [
            'videos' => $this->videos,
        ]);
    }
}
