<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;

// ۱. صفحه اصلی پلیر
Route::get('/', function () {
    return view('player');
});

// ۲. صفحه ورود و ثبت‌نام + کپچا و محافظت Anti-DDoS (Throttle)
Route::get('/auth', [AuthController::class, 'showAuthForm'])->name('login');
Route::get('/auth/captcha', [AuthController::class, 'getCaptcha']);

Route::middleware('throttle:6,1')->group(function () {
    Route::post('/auth/register', [AuthController::class, 'register']);
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('/auth/forgot-password', [AuthController::class, 'forgotPassword']);
});

Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');

// ۳. مسیرهای مخصوص کاربران لاگین‌شده
Route::middleware('auth')->group(function () {
    Route::post('/auth/profile', [AuthController::class, 'updateProfile']);
    Route::post('/auth/password', [AuthController::class, 'updatePassword']);

    // پلی‌لیست‌های شخصی هر اکانت (حداکثر ۱۰ پلی‌لیست)
    Route::post('/api/my-playlists', [PlaylistController::class, 'storeUserPlaylist']);
    Route::post('/api/my-playlists/{id}', [PlaylistController::class, 'updateUserPlaylist']);
    Route::delete('/api/my-playlists/{id}', [PlaylistController::class, 'destroyUserPlaylist']);
    Route::post('/api/my-playlists/{id}/add-track', [PlaylistController::class, 'addTrackToUserPlaylist']);
    Route::post('/api/my-playlists/{id}/remove-track', [PlaylistController::class, 'removeTrackFromUserPlaylist']);
});

// ۴. صفحه استودیو مدیریت (فقط و فقط مخصوص ادمین‌ها)
Route::get('/admin', function () {
    if (!Auth::check()) {
        return redirect('/auth');
    }
    if (Auth::user()->role !== 'مدیر') {
        return redirect('/');
    }
    return view('admin.studio');
})->middleware('auth');

// ۵. مسیرهای API
Route::prefix('api')->group(function () {

    // مسیرهای عمومی پلیر
    Route::get('/tracks', [TrackController::class, 'index']);
    Route::get('/tracks/{id}/stream', [TrackController::class, 'stream']);
    Route::post('/tracks/{id}/favorite', [TrackController::class, 'toggleFavorite']);

    Route::get('/playlists', [PlaylistController::class, 'index']);
    Route::get('/playlists/{id}', [PlaylistController::class, 'show']);

    Route::get('/artists', [ArtistController::class, 'index']);
    Route::get('/artists/{id}', [ArtistController::class, 'show']);

    Route::get('/genres', [GenreController::class, 'index']);

    Route::get('/albums', [AlbumController::class, 'index']);
    Route::get('/albums/{id}', [AlbumController::class, 'show']);

    // مسیرهای مدیریت (محافظت‌شده فقط برای نقش مدیر)
    Route::middleware('auth')->group(function () {
        Route::post('/genres', [GenreController::class, 'store']);
        Route::put('/genres/{id}', [GenreController::class, 'update']);
        Route::delete('/genres/{id}', [GenreController::class, 'destroy']);

        Route::prefix('admin')->group(function () {
            Route::get('/dashboard-stats', [TrackController::class, 'dashboardStats']);

            Route::post('/tracks', [TrackController::class, 'store']);
            Route::post('/tracks/{id}', [TrackController::class, 'update']);
            Route::post('/tracks/{id}/lyrics', [TrackController::class, 'saveLyrics']);
            Route::delete('/tracks/{id}', [TrackController::class, 'destroy']);

            Route::get('/playlists-all', [PlaylistController::class, 'adminIndex']);
            Route::post('/playlists/{id}/toggle-public', [PlaylistController::class, 'togglePublic']);
            Route::post('/playlists', [PlaylistController::class, 'store']);
            Route::post('/playlists/{id}', [PlaylistController::class, 'update']);
            Route::delete('/playlists/{id}', [PlaylistController::class, 'destroy']);

            Route::post('/artists', [ArtistController::class, 'store']);
            Route::post('/artists/{id}', [ArtistController::class, 'update']);
            Route::delete('/artists/{id}', [ArtistController::class, 'destroy']);

            Route::get('/users', [UserController::class, 'index']);
            Route::post('/users', [UserController::class, 'store']);
            Route::post('/users/{id}', [UserController::class, 'update']);
            Route::post('/users/{id}/toggle-status', [UserController::class, 'toggleStatus']);
            Route::delete('/users/{id}', [UserController::class, 'destroy']);

            Route::post('/albums', [AlbumController::class, 'store']);
            Route::post('/albums/{id}', [AlbumController::class, 'update']);
            Route::delete('/albums/{id}', [AlbumController::class, 'destroy']);
        });
    });
});