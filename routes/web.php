<?php

use App\Http\Controllers\MangeController; // FIXED: Correct spelling
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});
Route::post("/send-verification-code", [MangeController::class, "sendCode"])->name("verification.send");
Route::post("/verify-code", [MangeController::class, "verifyCode"])->name("verification.verify");
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::fallback(function () {
    return 'This page is not created yet';
});
Route::view("/register","auth.register");
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/video-watching/{id}', [MangeController::class, 'strema_video'])->name('videos.show'); // FIXED

Route::get('/home', function () {
    return view('layouts.app');
})->name('home');
// Route for test email send-email
Route::post("/emai", [MangeController::class, "sendme"])->name("send.email");
Route::post('/uploaded', [MangeController::class, 'upload'])->name('upload.video.post');
require __DIR__.'/auth.php';
