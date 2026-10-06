<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $guarded = [];

    protected $casts = [
        'is_lossless' => 'boolean',
        'favorited' => 'boolean',
        'lyrics' => 'array',
    ];
    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_track');
    }
    public function artistRef()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }
}
