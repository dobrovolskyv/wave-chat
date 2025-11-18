<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

//POSTS
Route::get('/posts/index', [PostController::class, 'index']);
Route::get('/posts/store', [PostController::class, 'store']);
Route::get('/posts/{post}/show', [PostController::class, 'show']);
Route::get('/posts/{post}/update', [PostController::class, 'update']);
Route::get('/posts/{post}/destroy', [PostController::class, 'destroy']); 

//PROFILES
Route::get('/profiles/index', [ProfileController::class, 'index']);
Route::get('/profiles/store', [ProfileController::class, 'store']);
Route::get('/profiles/{profile}/show', [ProfileController::class, 'show']);
Route::get('/profiles/{profile}/update', [ProfileController::class, 'update']);
Route::get('/profiles/{profile}/destroy', [ProfileController::class, 'destroy']);

//ROLES
Route::get('/roles/index', [RoleController::class, 'index']);
Route::get('/roles/store', [RoleController::class, 'store']);
Route::get('/roles/{role}/show', [RoleController::class, 'show']);
Route::get('/roles/{role}/update', [RoleController::class, 'update']);
Route::get('/roles/{role}/destroy', [RoleController::class, 'destroy']);


//Comments
Route::get('/comments/index', [CommentController::class, 'index']);
Route::get('/comments/store', [CommentController::class, 'store']);
Route::get('/comments/{comment}/show', [CommentController::class, 'show']);
Route::get('/comments/{comment}/update', [CommentController::class, 'update']);
Route::get('/comments/{comment}/destroy', [CommentController::class, 'destroy']);

//доделать для всех сущностей