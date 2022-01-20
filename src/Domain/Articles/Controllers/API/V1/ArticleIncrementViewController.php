<?php

declare(strict_types=1);

namespace Domain\Articles\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Domain\Articles\Actions\IncrementArticleViewAction;
use Domain\Articles\Models\Article;
use Domain\Articles\Resources\API\V1\ArticleResource;
use Illuminate\Http\JsonResponse;

class ArticleIncrementViewController extends Controller
{
    public function __construct(
        private IncrementArticleViewAction $incrementArticleViewAction,
    ) {
    }

    public function __invoke(Article $article): JsonResponse
    {
        ($this->incrementArticleViewAction)($article);

        $article->loadMissing(['counter', 'tags', 'comments']);

        return response()->json(new ArticleResource($article));
    }
}
