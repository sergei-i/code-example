<?php

declare(strict_types=1);

use Domain\Articles\Controllers\ArticleController;
use Domain\Articles\Controllers\ArticleHomeController;
use Domain\Articles\Controllers\ArticleTagController;
use Illuminate\Support\Facades\Route;

Route::get('/', ArticleHomeController::class)->name('home');

Route::prefix('articles')
    ->name('articles.')
    ->group(function () {
        Route::get('/', [ArticleController::class, 'index'])->name('index');
        Route::get('{slug}', [ArticleController::class, 'show'])->name('show');
        Route::get('tag/{tag}', ArticleTagController::class)->name('tag');
    });
