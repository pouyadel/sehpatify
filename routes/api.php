<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackController;
use App\Models\Playlist;
use App\Models\Artist;

// پلیر عمومی
Route::get('/tracks', [TrackController::class, 'index']);
Route::get('/tracks/{id}/stream', [TrackController::class, 'stream']);
Route::post('/tracks/{id}/favorite', [TrackController::class, 'toggleFavorite']);
Route::get('/playlists', fn() => response()->json(Playlist::all()));
Route::get('/artists', fn() => response()->json(Artist::all()));

// استودیو و مدیریت ادمین
Route::prefix('admin')->group(function () {
    Route::post('/tracks', [TrackController::class, 'store']);
    Route::post('/tracks/{id}', [TrackController::class, 'update']); // ویرایش با پشتیبانی FormData
    Route::delete('/tracks/{id}', [TrackController::class, 'destroy']);
    Route::post('/tracks/{id}/lyrics', [TrackController::class, 'saveLyrics']);
});