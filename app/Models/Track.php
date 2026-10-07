<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_lossless' => 'boolean',
        'favorited'   => 'boolean',
        'lyrics'      => 'array',
    ];

    // اضافه شدن خودکار آدرس استریم به خروجی JSON
    protected $appends = ['stream_url'];

    public function getStreamUrlAttribute()
    {
        return $this->audio_path ? url("/api/tracks/{$this->id}/stream") : null;
    }

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_track');
    }

    public function artistRef()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }
}