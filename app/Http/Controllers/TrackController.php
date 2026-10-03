<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index()
    {
        return response()->json(Track::all());
    }

    public function toggleFavorite($id)
    {
        $track = Track::findOrFail($id);
        $track->favorited = !$track->favorited;
        $track->save();
        return response()->json(['favorited' => $track->favorited]);
    }

    public function saveLyrics(Request $request, $id)
    {
        $request->validate(['lyrics' => 'present|array']);
        $track = Track::findOrFail($id);
        $track->lyrics = $request->lyrics;
        $track->save();

        return response()->json(['message' => 'لیریکس با موفقیت ذخیره شد', 'track' => $track]);
    }
}