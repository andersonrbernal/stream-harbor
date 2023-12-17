<?php

namespace Tests\Unit\Repositories;

use App\Models\Video;
use App\Repositories\Interfaces\VideoRepositoryInterface;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Pagination\LengthAwarePaginator;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class VideoRepositoryTest extends TestCase
{
    use WithFaker;

    protected Video $video;
    protected MockInterface|VideoRepositoryInterface $videoRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->video = new Video();
        $this->videoRepository = Mockery::mock(VideoRepositoryInterface::class);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->video);
        unset($this->videoRepository);
    }

    public function test_findAll()
    {
        $videos = [$this->video->factory()->mock(), $this->video->factory()->mock()];

        $this->videoRepository->shouldReceive('findAll')->once()->andReturn($videos);

        $this->assertEquals($videos, $this->videoRepository->findAll());
    }

    public function test_findAllWithColumns()
    {
        $columns = ['id', 'title'];
        $videos = $this->video->factory()->count(2)->mock();

        $filteredVideos = array_map(function ($video) use ($columns) {
            return array_intersect_key($video, array_flip($columns));
        }, $videos->raw());

        $this->videoRepository->shouldReceive('findAll')->once()->with($columns)->andReturn($filteredVideos);

        $this->assertEquals($filteredVideos, $this->videoRepository->findAll($columns));
    }

    public function test_findAllBy()
    {
        $videos = $this->video->factory()->count(2)->mock();

        $this->videoRepository->shouldReceive('findAllBy')->once()->andReturn($videos);

        $this->assertEquals($videos, $this->videoRepository->findAllBy());
    }

    public function test_findAllByWithColumns()
    {
        $videos = $this->video->factory()->count(2)->mock();
        $columns = ['media_category_id' => $videos->raw()[0]['media_category_id']];

        $filteredVideos = array_filter($videos->raw(), function ($video) use ($columns) {
            return $video['media_category_id'] === $columns['media_category_id'];
        });

        $this->videoRepository->shouldReceive('findAllBy')->once()->with($columns)->andReturn($filteredVideos);

        $this->assertEquals($filteredVideos, $this->videoRepository->findAllBy($columns));
    }

    public function test_findById()
    {
        $video = $this->video->factory()->mock();

        $this->videoRepository->shouldReceive('findById')->once()->andReturn($video);

        $this->assertEquals($video, $this->videoRepository->findById($video->raw()['id']));
    }

    public function test_paginate()
    {
        $perPage = 15;
        $videosCount = 2;
        $videos = $this->video->factory()->count($videosCount)->mock();
        $paginator = new LengthAwarePaginator($videos, $videosCount, $perPage);

        $this->videoRepository->shouldReceive('paginate')->once()->andReturn($paginator);

        $this->assertEquals($paginator, $this->videoRepository->paginate($perPage));
    }

    public function test_paginateWithColumns()
    {
        $perPage = 15;
        $videosCount = 2;
        $videos = $this->video->factory()->count($videosCount)->mock();
        $columns = ['id', 'title'];

        $filteredVideos = array_map(function ($video) use ($columns) {
            return array_intersect_key($video, array_flip($columns));
        }, $videos->raw());

        $paginator = new LengthAwarePaginator($filteredVideos, $videosCount, $perPage);

        $this->videoRepository->shouldReceive('paginate')->once()->with($perPage, $columns)->andReturn($paginator);

        $this->assertEquals($paginator, $this->videoRepository->paginate($perPage, $columns));
    }

    public function test_create()
    {
        $video = $this->video->factory()->mock();

        $this->videoRepository->shouldReceive('create')->once()->andReturn($video);

        $this->assertEquals($video, $this->videoRepository->create($video->raw()));
    }

    public function test_update()
    {
        $video = $this->video->factory()->mock();
        $updateVideo = ['title' => 'Updated Title'];
        $updatedVideo = array_merge($video->raw(), $updateVideo);

        $id = $video->raw()['id'];

        $this->videoRepository
            ->shouldReceive('update')
            ->once()
            ->with($id, $updateVideo)
            ->andReturn($updatedVideo);

        $this->assertEquals($updatedVideo, $this->videoRepository->update($id, $updateVideo));
    }

    public function test_delete()
    {
        $video = $this->video->factory()->mock();

        $this->videoRepository->shouldReceive('delete')->once()->andReturn($video);

        $this->assertEquals($video, $this->videoRepository->delete($video->raw()['id']));
    }
}
