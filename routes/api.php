<?php

use App\Http\Controllers\BlogPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/blog-posts', [BlogPostController::class, 'index']);
Route::post('/blog-posts', [BlogPostController::class, 'store']);
Route::get('/blog-posts/{id}', [BlogPostController::class, 'show']);
Route::put('/blog-posts/{id}', [BlogPostController::class, 'update']);
Route::delete('/blog-posts/{id}', [BlogPostController::class, 'destroy']);
