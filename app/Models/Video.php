<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Video
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $video_url
 * @property string $thumb_url
 * @property int $media_category_id
 * @property int $interaction_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @property-read \App\Models\MediaCategory $mediaCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Interaction[] $interactions
 * @property-read int|null $interactions_count
 */
class Video extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'video_url',
        'thumb_url',
        'media_category_id',
        'interaction_id',
    ];

    /**
     * Get the media category associated with the video.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mediaCategory(): belongsTo
    {
        return $this->belongsTo(MediaCategory::class);
    }

    /**
     * Get the interactions associated with the video.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function interactions(): HasMany
    {
        return $this->hasMany(Interaction::class);
    }

    /**
     * Counts the number of likes for the video.
     *
     * @return int The number of likes.
     */
    public function countLikes(): int
    {
        return $this->interactions()
            ->where('liked', true)
            ->count();
    }

    /**
     * Counts the number of views for the video.
     *
     * @return int The number of views.
     */
    public function countViews(): int
    {
        return $this->interactions()
            ->where('viewed', true)
            ->count();
    }

    /**
     * Checks if the video is liked by the user.
     *
     * @param int $id The user id.
     * @return bool True if the video is liked by the user, false otherwise.
     */
    public function isLikedByUser(int $id): bool
    {
        return $this->interactions()
            ->where('user_id', $id)
            ->where('liked', true)
            ->exists();
    }

    /**
     * Checks if the video is viewed by the user.
     *
     * @param int $id The user id.
     * @return bool True if the video is viewed by the user, false otherwise.
     */
    public function isViewedByUser(int $id): bool
    {
        return $this->interactions()
            ->where('user_id', $id)
            ->where('viewed', true)
            ->exists();
    }

    /**
     * Records a like interaction for the video.
     *
     * @return void
     */
    public function like(int $id): void
    {
        $this->interactions()->create([
            'user_id' => $id,
            'liked' => true,
        ]);
    }

    /**
     * Records a dislike interaction for the video.
     *
     * @return void
     */
    public function dislike(int $id): void
    {
        $this->interactions()
            ->where('user_id', $id)
            ->where('liked', true)
            ->delete();
    }

    /**
     * Records a view interaction for the video.
     *
     * @return void
     */
    public function view(int $id): void
    {
        $this->interactions()->create([
            'user_id' => $id,
            'viewed' => true,
        ]);
    }

    /**
     * Removes the view interaction for the video.
     *
     * @return void
     */
    public function unview(int $id): void
    {
        $this->interactions()
            ->where('user_id', $id)
            ->where('viewed', true)
            ->delete();
    }
}
