<?php

declare(strict_types=1);

namespace Domain\Articles\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Domain\Articles\Actions\IncrementArticleLikeAction;
use Domain\Articles\Models\Article;
use Domain\Articles\Resources\API\V1\ArticleResource;
use Illuminate\Http\JsonResponse;

class ArticleIncrementLikeController extends Controller
{
    public function __construct(
        private IncrementArticleLikeAction $incrementArticleLikeAction,
    ) {
    }

    public function __invoke(Article $article): JsonResponse
    {
        ($this->incrementArticleLikeAction)($article);

        $article->loadMissing(['counter', 'tags', 'comments']);

        return response()->json(new ArticleResource($article));
    }
}
