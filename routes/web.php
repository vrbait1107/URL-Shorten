<?php

use App\Http\Controllers\Admin\ShortUrlController as AdminShortUrlController;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;
use AshAllenDesign\ShortURL\Controllers\ShortURLController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [AdminShortUrlController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/{shortUrl}', [AdminShortUrlController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/{shortUrl}', [AdminShortUrlController::class, 'update'])->name('dashboard.update');
    Route::put('/dashboard/{shortUrl}/disable', [AdminShortUrlController::class, 'disable'])->name('dashboard.disable');
    Route::delete('/dashboard/{shortUrl}', [AdminShortUrlController::class, 'destroy'])->name('dashboard.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/convert-short-url', UrlController::class)->name('convert-short-url');
// Route::get('/short/{shortURLKey}', ShortURLController::class)->name('short-url.invoke');

require __DIR__.'/auth.php';
