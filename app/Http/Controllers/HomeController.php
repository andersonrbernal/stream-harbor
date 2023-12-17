<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Repositories\Interfaces\VideoRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    const CACHE_TIME = 60;
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
        return view('pages.home.index', [
            'title' => 'Home',
            'trendingVideo' => $this->getTrendingVideo(),
            'trendingVideos' => $this->getTrendingVideos(),
            'mostLikedVideos' => $this->getMostLikedVideosWithPagination(),
            'mostViewedVideos' => $this->getMostViewedVideosWithPagination(),
        ]);
    }

    /**
     * Retrieves the trending video.
     *
     * @return mixed The trending video.
     */
    private function getTrendingVideo()
    {
        return Cache::remember('trending_video', self::CACHE_TIME, fn () => $this->videoRepository->getTrendingVideo());
    }

    /**
     * Retrieves the most liked videos with pagination.
     *
     * @return mixed The most liked videos with pagination.
     */
    private function getMostLikedVideosWithPagination()
    {
        return Cache::remember('most_liked_videos', self::CACHE_TIME, fn () => $this->videoRepository->getMostLikedVideosWithPagination());
    }

    /**
     * Retrieves the most viewed videos with pagination.
     *
     * @return mixed The most viewed videos with pagination.
     */
    private function getMostViewedVideosWithPagination()
    {
        return Cache::remember('most_viewed_videos', self::CACHE_TIME, fn () => $this->videoRepository->getMostViewedVideosWithPagination());
    }

    /**
     * Retrieves the trending videos.
     *
     * @return mixed The trending videos.
     */
    private function getTrendingVideos()
    {
        return Cache::remember('trending_videos', self::CACHE_TIME, fn () => $this->videoRepository->getTrendingVideos());
    }
}
