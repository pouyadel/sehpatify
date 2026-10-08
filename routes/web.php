<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Models\Genre;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('player');
})->name('player');

Route::get('/admin/studio', function () {
    $genres = Genre::withCount('tracks')->get();
    return view('admin.studio' ,[
        'genres' => $genres
    ]);
})->name('admin.studio');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');
    Route::put('/genres/{genre}', [GenreController::class, 'update'])->name('genres.update');
    Route::delete('/genres/{genre}', [GenreController::class, 'destroy'])->name('genres.destroy');
});