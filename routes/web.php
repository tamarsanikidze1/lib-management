<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;


Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class)->only(['index', 'create', 'store']);
