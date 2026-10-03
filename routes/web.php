<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('player');
})->name('player');

Route::get('/admin/studio', function () {
    return view('admin.studio');
})->name('admin.studio');