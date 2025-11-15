<?php

use App\Livewire\ShowTweets;
use App\Livewire\User\UploadPhoto;
use Illuminate\Support\Facades\Route;


Route::get('/upload-photo', UploadPhoto::class)->name('upload-photo')->middleware('auth');
Route::get('/tweets', ShowTweets::class)->name('tweets')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
