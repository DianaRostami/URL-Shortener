<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

Route::get('/', [UrlController::class, 'index']);

Route::post('/shorten', [UrlController::class, 'shorten'])->name('url.shorten');

Route::get('/{shortUrl}', [UrlController::class, 'redirect'])->name('url.redirect');
