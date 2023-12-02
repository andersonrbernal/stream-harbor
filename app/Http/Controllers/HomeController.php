<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Repositories\Interfaces\VideoRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    protected VideoRepositoryInterface $videoRepository;

    /**
     * Create a new HomeController instance.
     *
     * @param  VideoRepositoryInterface  $videoRepository
     * @return void
     */
    public function __construct(VideoRepositoryInterface $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('pages.home.index', ['title' => 'Home', 'video' => $this->getTrendingVideo()]);
    }

    /**
     * Get the trending video.
     *
     * @return \App\Models\Video
     */
    private function getTrendingVideo()
    {
        return Cache::remember('trending_video', 3600, fn () => $this->getTrendingVideoCallback());
    }

    /**
     * Get the trending video callback.
     *
     * @return \App\Models\Video
     */
    private function getTrendingVideoCallback()
    {
        return Video::withCount('interactions as total_views')
            ->withCount(['interactions as total_likes' => function ($query) {
                $query->where('liked', true);
            }])
            ->orderByDesc('total_views')
            ->orderByDesc('total_likes')
            ->first();
    }
}
