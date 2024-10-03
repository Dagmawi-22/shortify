<?php

use App\Http\Controllers\UrlController;

Route::get('/', [UrlController::class, 'index']);
Route::post('/shorten', [UrlController::class, 'shorten'])->name('shorten');
Route::get('/{shortenedUrl}', [UrlController::class, 'redirect']);
