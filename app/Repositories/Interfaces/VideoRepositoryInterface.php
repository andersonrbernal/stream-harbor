<?php

namespace App\Repositories\Interfaces;

interface VideoRepositoryInterface
{
    public function findAll($columns = ['*']);
    public function findById($id);
    public function findAllBy($columns = ['*']);
    public function paginate($perPage = 15, $columns = ['*']);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function getTrendingVideo();
    public function getTrendingVideos();
    public function getMostLikedVideosWithPagination();
    public function getMostViewedVideosWithPagination();
}
