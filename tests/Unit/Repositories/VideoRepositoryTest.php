<?php

namespace Tests\Unit\Repositories;

use App\Models\Video;
use App\Repositories\Interfaces\VideoRepositoryInterface;
use Faker\Provider\Youtube;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Pagination\LengthAwarePaginator;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\TestCase;

class VideoRepositoryTest extends TestCase
{
    use WithFaker;

    protected $video;
    protected $videoRepository;

    public function setUp(): void
    {
        parent::setUp();

        $this->videoRepository = $this->createMock(VideoRepositoryInterface::class);

        $this->faker->addProvider(new Youtube($this->faker));
        $this->video = Video::factory()->makeOne([
            'id' => $this->faker->unique()->randomNumber(),
            'title' => $this->faker->title(),
            'description' => $this->faker->realText(),
            'video_url' => $this->faker->youtubeUri(),
            'thumb_url' => $this->faker->imageUrl(),
            'media_category_id' => $this->faker->unique()->randomNumber(),
        ]);
    }

    public function testFindAll()
    {
        $videos = [$this->video, $this->video];

        $this->videoRepository
            ->expects($this->once())
            ->method('findAll')
            ->willReturn($videos);

        $foundVideos = $this->videoRepository->findAll();
        $this->assertEquals($videos, $foundVideos);
    }

    public function testFindAllBy()
    {
        $videos = [$this->video, $this->video];

        $this->videoRepository
            ->expects($this->once())
            ->method('findAllBy')
            ->willReturn($videos);

        $foundVideos = $this->videoRepository->findAllBy();
        $this->assertEquals($videos, $foundVideos);
    }

    public function testFindById()
    {
        $video = $this->video;

        $this->videoRepository
            ->expects($this->once())
            ->method('findById')
            ->with($video->id)
            ->willReturn($video);

        $foundVideo = $this->videoRepository->findById($video->id);
        $this->assertEquals($video, $foundVideo);
    }

    public function testPaginate()
    {
        $videos = [$this->video, $this->video];
        $paginatedVideos = new LengthAwarePaginator($videos, count($videos), 15);

        $this->videoRepository
            ->expects($this->once())
            ->method('paginate')
            ->with(15, ['*'])
            ->willReturn($paginatedVideos);

        $result = $this->videoRepository->paginate(15);
        $this->assertEquals($result, $paginatedVideos);
    }

    public function testCreate()
    {
        $video = $this->video;

        $this->videoRepository
            ->expects($this->once())
            ->method('create')
            ->with($video->toArray())
            ->willReturn($video);

        $createdVideo = $this->videoRepository->create($video->toArray());
        $this->assertEquals($video, $createdVideo);
    }

    public function testUpdate()
    {
        $video = $this->video;

        $this->videoRepository
            ->expects($this->once())
            ->method('update')
            ->with($video->id, $video->toArray())
            ->willReturn($video);

        $updatedVideo = $this->videoRepository->update($video->id, $video->toArray());
        $this->assertEquals($video, $updatedVideo);
    }

    public function testDelete()
    {
        $video = $this->video;

        $this->videoRepository
            ->expects($this->once())
            ->method('delete')
            ->with($video->id)
            ->willReturn(true);

        $videoDeleted = $this->videoRepository->delete($video->id);
        $this->assertTrue($videoDeleted);
    }
}
