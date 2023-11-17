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
        return $this->video->find($id)->first();
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
        return $this->video->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->video->find($id)->delete();
    }
}
