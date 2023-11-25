<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Interaction
 * 
 * Represents an interaction between a user and a video.
 * 
 * @package App\Models
 */
class Interaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'liked',
        'viewed',
        'user_id',
        'video_id',
    ];

    /**
     * Get the user that the interaction belongs to.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the video that the interaction belongs to.
     *
     * @return BelongsTo
     */
    public function video(): BelongsTo
    {
        return $this->belongsTo(Video::class);
    }

    /**
     * Count the number of views for the video associated with this interaction.
     *
     * @return int
     */
    public function countViews(): int
    {
        return $this->where('video_id', $this->video_id)
            ->where('viewed', true)
            ->count();
    }

    /**
     * Count the number of likes for the video associated with this interaction.
     *
     * @return int
     */
    public function countLikes(): int
    {
        return $this->where('video_id', $this->video_id)
            ->where('liked', true)
            ->count();
    }
}
