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
        return view('pages.home.index', [
            'title' => 'Home',
            'trendingVideo' => $this->getTrendingVideo(),
            'trendingVideos' => $this->getTrendingVideos(),
            'mostLikedVideos' => $this->getMostLikedVideosWithPagination(),
            'mostViewedVideos' => $this->getMostViewedVideosWithPagination(),
        ]);
    }

    /**
     * Get the trending video.
     *
     * @return \App\Models\Video
     */
    private function getTrendingVideo()
    {
        return Cache::remember('trending_video', 60, fn () => $this->getTrendingVideoCallback());
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

    /**
     * Get the most liked videos with pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    private function getMostLikedVideosWithPagination()
    {
        return Cache::remember('most_liked_videos', 60, fn () => $this->getMostLikedVideosWithPaginationCallback());
    }

    /**
     * Get the most liked videos with pagination callback.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    private function getMostLikedVideosWithPaginationCallback()
    {
        return Video::withCount(['interactions as total_likes' => function ($query) {
            $query->where('liked', true);
        }])
            ->paginate(8);
    }

    /**
     * Get the most viewed videos with pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    private function getMostViewedVideosWithPagination()
    {
        return Cache::remember('most_viewed_videos', 60, fn () => $this->getMostViewedVideosWithPaginationCallback());
    }

    /**
     * Get the most viewed videos with pagination callback.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    private function getMostViewedVideosWithPaginationCallback()
    {
        return Video::withCount(['interactions as total_views' => function ($query) {
            $query->where('viewed', true);
        }])
            ->paginate(8);
    }

    private function getTrendingVideos()
    {
        return Cache::remember('trending_videos', 60, fn () => $this->getTrendingVideosCallback());
    }

    private function getTrendingVideosCallback()
    {
        return Video::withCount('interactions as total_views')
            ->withCount(['interactions as total_likes' => function ($query) {
                $query->where('liked', true);
                $query->where('viewed', true);
            }])
            ->paginate(8);
    }
}
