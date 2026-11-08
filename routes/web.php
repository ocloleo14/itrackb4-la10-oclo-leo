<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return redirect('/books');
});

Route::get('/books/featured', [BookController::class, 'featured'])
    ->name('books.featured');

Route::resource('books', BookController::class);