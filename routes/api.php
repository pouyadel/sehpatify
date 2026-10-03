<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackController;
use App\Models\Playlist;
use App\Models\Artist;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/tracks', [TrackController::class, 'index']);
Route::post('/tracks/{id}/favorite', [TrackController::class, 'toggleFavorite']);
Route::get('/playlists', fn() => response()->json(Playlist::all()));
Route::get('/artists', fn() => response()->json(Artist::all()));

// APIهای استودیو ادمین
Route::prefix('admin')->group(function () {
    Route::post('/tracks/{id}/lyrics', [TrackController::class, 'saveLyrics']);
});