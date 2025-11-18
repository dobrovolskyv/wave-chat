<?php

use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/posts', [PostController::class, 'index']);
// Route::post('/posts', [PostController::class, 'store']);
// Route::get('/posts/{post}', [PostController::class, 'show']);
// Route::patch('/posts/{post}', [PostController::class, 'update']);
// Route::delete('/posts/{post}', [PostController::class, 'destroy']);


Route::apiResource('posts', PostController::class);
Route::apiResource('comments', CommentController::class);
Route::apiResource('profiles', ProfileController::class);
Route::apiResource('messages', MessageController::class);