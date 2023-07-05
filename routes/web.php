<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;
use AshAllenDesign\ShortURL\Controllers\ShortURLController;

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


Route::get('/convert-short-url', UrlController::class)->name('convert-short-url');
Route::get('/{shortURLKey}', ShortURLController::class)->name('short-url.invoke');
