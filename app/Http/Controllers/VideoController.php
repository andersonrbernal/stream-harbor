<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Repositories\Interfaces\VideoRepositoryInterface;

class VideoController extends Controller
{
    protected VideoRepositoryInterface $videoRepository;

    public function __construct(VideoRepositoryInterface $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    /**
     * Display the specified resource.
     *
     * @var Video $video
     * @return \Illuminate\Contracts\View\View
     */
    public function show()
    {
        $id = request()->route('id');
        $video = $this->videoRepository->findById($id);

        if (!isset($video)) abort(404);

        return view('pages.videos.show', ['title' => $video->title, 'video' => $video]);
    }
}
