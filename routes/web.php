<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;

// جلوگیری از خطای ریدایرکت لاگین در لاراول
Route::get('/login', function () {
    return redirect('/admin/studio');
})->name('login');

// صفحه اصلی و استودیو
Route::get('/', function () {
    return view('player');
});

Route::get('/admin/studio', function () {
    return view('admin.studio');
})->name('admin.studio');

// مسیرهای API و دیتای استودیو
Route::prefix('api')->group(function () {
    // سبک‌ها
    Route::get('/genres', [GenreController::class, 'index']);
    Route::post('/genres', [GenreController::class, 'store']);
    Route::match(['put', 'post'], '/genres/{id}', [GenreController::class, 'update']);
    Route::match(['delete', 'post'], '/genres/{id}', [GenreController::class, 'destroy']);

    // آهنگ‌ها
    Route::get('/tracks', [TrackController::class, 'index']);
    Route::post('/admin/tracks', [TrackController::class, 'store']);
    Route::post('/admin/tracks/{id}', [TrackController::class, 'update']);
    Route::delete('/admin/tracks/{id}', [TrackController::class, 'destroy']);
    Route::post('/admin/tracks/{id}/lyrics', [TrackController::class, 'saveLyrics']);

    // پلی‌لیست‌ها
    Route::get('/playlists', [PlaylistController::class, 'index']);
    Route::post('/admin/playlists', [PlaylistController::class, 'store']);
    Route::post('/admin/playlists/{id}', [PlaylistController::class, 'update']);
    Route::delete('/admin/playlists/{id}', [PlaylistController::class, 'destroy']);

    // هنرمندان
    Route::get('/artists', [ArtistController::class, 'index']);
    Route::post('/admin/artists', [ArtistController::class, 'store']);
    Route::post('/admin/artists/{id}', [ArtistController::class, 'update']);
    Route::delete('/admin/artists/{id}', [ArtistController::class, 'destroy']);

    // کاربران و داشبورد
    Route::get('/admin/users', [UserController::class, 'index']);
    Route::post('/admin/users', [UserController::class, 'store']);
    Route::post('/admin/users/{id}', [UserController::class, 'update']);
    Route::post('/admin/users/{id}/toggle-status', [UserController::class, 'toggleStatus']);
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy']);
    Route::get('/admin/dashboard-stats', [TrackController::class, 'dashboardStats']);
});

Route::prefix('api')->group(function () {
    Route::get('/albums', [AlbumController::class, 'index']);
    Route::get('/albums/{id}', [AlbumController::class, 'show']);
    
    Route::prefix('admin')->group(function () {
        Route::post('/albums', [AlbumController::class, 'store']);
        Route::post('/albums/{id}', [AlbumController::class, 'update']);
        Route::delete('/albums/{id}', [AlbumController::class, 'destroy']);
    });
});

Route::get('/auth', [AuthController::class, 'showAuthForm'])->name('login');
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');