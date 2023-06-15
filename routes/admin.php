<?php

use App\Http\Controllers\Admin\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;


Route::get('/admin/books', [BookController::class, 'index']);
Route::get('/admin/books/create', [BookController::class, 'create']);
Route::get('/admin/books/{id}', [BookController::class, 'edit']);
Route::post('/admin/books', [BookController::class, 'store']);
Route::post('/admin/books/{id}', [BookController::class, 'update']);


Route::get('/admin/users', [UserController::class, 'index']);