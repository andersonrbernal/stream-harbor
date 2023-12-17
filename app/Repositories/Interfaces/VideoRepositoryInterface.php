<?php

namespace App\Repositories\Interfaces;

/**
 * Interface VideoRepositoryInterface
 *
 * This interface defines the methods for interacting with the video repository.
 */
interface VideoRepositoryInterface
{
    /**
     * Get all videos.
     *
     * @param array $columns The columns to retrieve.
     * @return array The list of videos.
     */
    public function findAll($columns = ['*']);

    /**
     * Find a video by its ID.
     *
     * @param int $id The ID of the video.
     * @return mixed The video object.
     */
    public function findById($id);

    /**
     * Find all videos by given criteria.
     *
     * @param array $columns The columns to retrieve.
     * @return array The list of videos.
     */
    public function findAllBy($columns = ['*']);

    /**
     * Paginate the videos.
     *
     * @param int $perPage The number of videos per page.
     * @param array $columns The columns to retrieve.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator The paginated videos.
     */
    public function paginate($perPage = 15, $columns = ['*']);

    /**
     * Create a new video.
     *
     * @param array $data The video data.
     * @return mixed The created video object.
     */
    public function create(array $data);

    /**
     * Update a video.
     *
     * @param int $id The ID of the video to update.
     * @param array $data The updated video data.
     * @return bool True if the video was updated successfully, false otherwise.
     */
    public function update($id, array $data);

    /**
     * Delete a video.
     *
     * @param int $id The ID of the video to delete.
     * @return bool True if the video was deleted successfully, false otherwise.
     */
    public function delete($id);

    /**
     * Get the trending video.
     *
     * @return mixed The trending video object.
     */
    public function getTrendingVideo();

    /**
     * Get the trending videos.
     *
     * @return array The list of trending videos.
     */
    public function getTrendingVideos();

    /**
     * Get the most liked videos with pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator The paginated most liked videos.
     */
    public function getMostLikedVideosWithPagination();

    /**
     * Get the most viewed videos with pagination.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator The paginated most viewed videos.
     */
    public function getMostViewedVideosWithPagination();
}
