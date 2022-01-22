<?php

declare(strict_types=1);

use Domain\Articles\Controllers\API\V1\ArticleStoreCommentController;
use Domain\Articles\Controllers\API\V1\ArticleController;
use Domain\Articles\Controllers\API\V1\ArticleDecrementLikeController;
use Domain\Articles\Controllers\API\V1\ArticleIncrementLikeController;
use Domain\Articles\Controllers\API\V1\ArticleIncrementViewController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('articles')->group(function () {
        Route::prefix('{article}')->group(function () {
            Route::get('/', [ArticleController::class, 'show']);
            Route::put('views/increment', ArticleIncrementViewController::class);
            Route::put('likes/increment', ArticleIncrementLikeController::class);
            Route::put('likes/decrement', ArticleDecrementLikeController::class);
            Route::post('comments/store', ArticleStoreCommentController::class);
        });
    });
});
