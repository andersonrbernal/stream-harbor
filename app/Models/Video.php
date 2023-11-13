<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Video extends Model
{
    use HasFactory;

    /**
     * Get the mediaCategory associated with the country.
     */
    public function mediaCategory(): HasMany
    {
        return $this->hasMany(MediaCategory::class);
    }
}
