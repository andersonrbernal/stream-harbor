<?php

namespace App\Repositories;

use App\Models\Video;
use App\Repositories\Interfaces\VideoRepositoryInterface;

class VideoRepository implements VideoRepositoryInterface
{
    protected $video;

    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    public function findAll($columns = ['*'])
    {
        return $this->video->all($columns);
    }

    public function findAllBy($columns = ['*'])
    {
        return $this->video->find($columns)->get();
    }

    public function findById($id)
    {
        return $this->video->where('id', $id)->first();
    }

    public function paginate($perPage = 15, $columns = ['*'])
    {
        return $this->video->paginate($perPage, $columns);
    }

    public function create(array $data)
    {
        return $this->video->create($data);
    }

    public function update($id, array $data)
    {
        return $this->video->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->video->where('id', $id)->delete();
    }

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

    public function getMostLikedVideosWithPagination($per_page = 8)
    {
        return $this->video
            ->withCount(['interactions as total_likes' => fn ($query) => $query->where('liked', true)])
            ->paginate($per_page);
    }

    public function getMostViewedVideosWithPagination($per_page = 8)
    {
        return $this->video
            ->withCount(['interactions as total_views' => fn ($query) => $query->where('viewed', true)])
            ->paginate($per_page);
    }
}
