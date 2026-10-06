<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $guarded = [];

    protected $casts = [
        'verified' => 'boolean',
    ];

    // رابطه چند-به-چند با سبک‌ها
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'artist_genre');
    }

    // رابطه یک-به-چند با آهنگ‌ها
    public function tracks()
    {
        return $this->hasMany(Track::class, 'artist_id');
    }
}