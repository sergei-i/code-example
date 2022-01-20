<?php

declare(strict_types=1);

namespace Domain\Articles\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Domain\Articles\Models\Article;
use Domain\Articles\Resources\API\V1\ArticleResource;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    public function show(Article $article): JsonResponse
    {
        $article->loadMissing(['counter', 'tags', 'comments']);

        return response()->json(new ArticleResource($article));
    }
}
