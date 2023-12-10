<?php

namespace App\Livewire;

use App\Models\Video;
use App\Repositories\Interfaces\VideoRepositoryInterface;
use Livewire\Component;

class VideoCard extends Component
{
    protected Video $video;
    protected int $id;
    protected VideoRepositoryInterface $videoRepository;

    public function boot(VideoRepositoryInterface $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    public function mount($id)
    {
        $this->id = $id;
        $this->video = $this->videoRepository->findById($id);
    }

    public function placeholder()
    {
        return view('livewire.video-card-placeholder');
    }

    public function render()
    {
        return view('livewire.video-card', [
            'video' => $this->getVideo(),
            'id' => $this->id,
        ]);
    }

    private function getVideo()
    {
        return $this->videoRepository->findById($this->id);
    }
}
