<?php

use App\Http\Controllers\News\CommentController;
use App\Http\Controllers\News\PostController;
use Illuminate\Support\Facades\Route;


Route::get('news', [PostController::class, 'index'])
    ->name('news');

Route::get('news/{post:slug}', [PostController::class, 'view'])
    ->name('news.view');

Route::post('comment', [CommentController::class, 'store'])
    ->name('comment.store');
