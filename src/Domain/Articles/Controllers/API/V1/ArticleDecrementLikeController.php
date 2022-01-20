<?php

declare(strict_types=1);

namespace Domain\Articles\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Domain\Articles\Actions\DecrementArticleLikeAction;
use Domain\Articles\Models\Article;
use Domain\Articles\Resources\API\V1\ArticleResource;
use Illuminate\Http\JsonResponse;

class ArticleDecrementLikeController extends Controller
{
    public function __construct(
        private DecrementArticleLikeAction $decrementArticleLikeAction,
    ) {
    }

    public function __invoke(Article $article): JsonResponse
    {
        ($this->decrementArticleLikeAction)($article);

        $article->loadMissing(['counter', 'tags', 'comments']);

        return response()->json(new ArticleResource($article));
    }
}
