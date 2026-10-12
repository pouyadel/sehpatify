<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'is_lossless' => 'boolean',
        'favorited'   => 'boolean',
        'lyrics'      => 'array',
        'duration_sec' => 'integer',
        'streams' => 'integer',
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

    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'artist_track')->withTimestamps();
    }

    // خواننده اصلی (برای سازگاری با کدهای قبلی)
    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }
}