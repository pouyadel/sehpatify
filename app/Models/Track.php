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
}