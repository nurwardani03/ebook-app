<?php

use App\Http\Controllers\EbookController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('login'));

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [EbookController::class, 'index'])->name('dashboard');
    Route::get('/ebooks/{ebook}/stream', [EbookController::class, 'stream'])->name('ebooks.stream');
    Route::delete('/ebooks/{ebook}', [EbookController::class, 'destroy'])->name('ebooks.destroy');
});
