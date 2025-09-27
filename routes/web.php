<?php

use App\Http\Controllers\MangeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("layouts.app");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::fallback(function() {
return "This page is not created yet";
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// web.php
// Route::get('/video/{id}', function($id) {
//     return view('video-card-display'); // later fetch from DB
// })->name('videos.show');
 Route::get('/video-watching/{id}', [MangeController::class, 'strema_video'])
     ->name('videos.show');
Route::get('home', function() {
return view("layouts.app");
})->name("home");
require __DIR__.'/auth.php';
