<?php

namespace App\Repositories;

use App\Models\Video;
use App\Repositories\Interfaces\VideoRepositoryInterface;

class VideoRepository implements VideoRepositoryInterface
{
    /**
     * Class VideoRepository
     *
     * This class represents a repository for managing video data.
     */
    protected $video;

    /**
     * VideoRepository constructor.
     *
     * @param Video $video The video model instance.
     */
    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    /**
     * Get all videos.
     *
     * @param array $columns The columns to retrieve.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll($columns = ['*'])
    {
        return $this->video->all($columns);
    }

    /**
     * Get all videos by specified columns.
     *
     * @param array $columns The columns to retrieve.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAllBy($columns = ['*'])
    {
        return $this->video->find($columns)->get();
    }

    /**
     * Find a video by its ID.
     *
     * @param int $id The video ID.
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
     */
    public function findById($id)
    {
        return $this->video->where('id', $id)->first();
    }

    /**
     * Paginate videos.
     *
     * @param int $perPage The number of videos per page.
     * @param array $columns The columns to retrieve.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage = 15, $columns = ['*'])
    {
        return $this->video->paginate($perPage, $columns);
    }

    /**
     * Create a new video.
     *
     * @param array $data The video data.
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        return $this->video->create($data);
    }

    /**
     * Update a video by its ID.
     *
     * @param int $id The video ID.
     * @param array $data The video data to update.
     * @return int
     */
    public function update($id, array $data)
    {
        return $this->video->where('id', $id)->update($data);
    }

    /**
     * Delete a video by its ID.
     *
     * @param int $id The video ID.
     * @return int
     */
    public function delete($id)
    {
        return $this->video->where('id', $id)->delete();
    }

    /**
     * Get the trending video.
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
     */
    public function getTrendingVideo()
    {
        return $this->video->withCount('interactions as total_views')
            ->withCount(['interactions as total_likes' => function ($query) {
                $query->where('liked', true);
                $query->where('viewed', true);
            }])
            ->orderByDesc('total_views')
            ->orderByDesc('total_likes')
            ->first();
    }

    /**
     * Get the trending videos.
     *
     * @param int $per_page The number of videos per page.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getTrendingVideos($per_page = 8)
    {
        return $this->video
            ->withCount('interactions as total_views')
            ->withCount(['interactions as total_likes' => function ($query) {
                $query->where('liked', true);
                $query->where('viewed', true);
            }])
            ->paginate($per_page);
    }

    /**
     * Get the most liked videos with pagination.
     *
     * @param int $per_page The number of videos per page.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getMostLikedVideosWithPagination($per_page = 8)
    {
        return $this->video
            ->withCount(['interactions as total_likes' => fn ($query) => $query->where('liked', true)])
            ->paginate($per_page);
    }

    /**
     * Get the most viewed videos with pagination.
     *
     * @param int $per_page The number of videos per page.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getMostViewedVideosWithPagination($per_page = 8)
    {
        return $this->video
            ->withCount(['interactions as total_views' => fn ($query) => $query->where('viewed', true)])
            ->paginate($per_page);
    }
}
