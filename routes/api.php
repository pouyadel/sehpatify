<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\UserController;

// روت‌های عمومی
Route::get('/tracks', [TrackController::class, 'index']);
Route::get('/tracks/{id}/stream', [TrackController::class, 'stream']);
Route::post('/tracks/{id}/favorite', [TrackController::class, 'toggleFavorite']);
Route::get('/playlists', [PlaylistController::class, 'index']);
Route::get('/playlists/{id}', [\App\Http\Controllers\PlaylistController::class, 'show']);
Route::get('/artists', [ArtistController::class, 'index']);
Route::get('/artists/{id}', [\App\Http\Controllers\ArtistController::class, 'show']);
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

    // مدیریت کاربران (بدون اشتراک پرمیوم - فقط کاربر عادی و مدیر)
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    Route::post('/users/{id}', [UserController::class, 'update']);
    Route::post('/users/{id}/toggle-status', [UserController::class, 'toggleStatus']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
});