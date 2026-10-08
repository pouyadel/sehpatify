<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['name', 'slug'];

    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'artist_genre');
    }
    // در صورتی که هر آهنگ به یک ژانر متصل است
    public function tracks()
    {
        return $this->hasMany(Track::class);
    }
}