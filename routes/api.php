<?php

use App\Http\Controllers\BlogPostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/blog-posts', [BlogPostController::class, 'index']);
Route::post('/blog-posts', [BlogPostController::class, 'store']);
Route::get('/blog-posts/{id}', [BlogPostController::class, 'show']);
Route::put('/blog-posts/{id}', [BlogPostController::class, 'update']);
Route::delete('/blog-posts/{id}', [BlogPostController::class, 'destroy']);

Route::get('/test-cache', function () {
    Cache::put('test_key', 'This is a test value', 60);

    if (Cache::has('test_key')) {
        return Cache::get('test_key');
    }

    return 'Cache not working.';
});
