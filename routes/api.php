<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ArtistController;

// پلیر عمومی
Route::get('/tracks', [TrackController::class, 'index']);
Route::get('/tracks/{id}/stream', [TrackController::class, 'stream']);
Route::post('/tracks/{id}/favorite', [TrackController::class, 'toggleFavorite']);
Route::get('/playlists', [PlaylistController::class, 'index']);

// روت‌های عمومی هنرمندان و سبک‌ها
Route::get('/artists', [ArtistController::class, 'index']);
Route::get('/artists/{id}', [ArtistController::class, 'show']);
Route::get('/genres', [ArtistController::class, 'genres']);

// پنل ادمین و استودیو
Route::prefix('admin')->group(function () {
    Route::get('/dashboard-stats', [TrackController::class, 'dashboardStats']);

    // مدیریت قطعات
    Route::post('/tracks', [TrackController::class, 'store']);
    Route::post('/tracks/{id}', [TrackController::class, 'update']);
    Route::delete('/tracks/{id}', [TrackController::class, 'destroy']);
    Route::post('/tracks/{id}/lyrics', [TrackController::class, 'saveLyrics']);

    // مدیریت پلی‌لیست‌ها
    Route::post('/playlists', [PlaylistController::class, 'store']);
    Route::post('/playlists/{id}', [PlaylistController::class, 'update']);
    Route::delete('/playlists/{id}', [PlaylistController::class, 'destroy']);

    // مدیریت هنرمندان
    Route::post('/artists', [ArtistController::class, 'store']);
    Route::post('/artists/{id}', [ArtistController::class, 'update']);
    Route::delete('/artists/{id}', [ArtistController::class, 'destroy']);
});