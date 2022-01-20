<?php

declare(strict_types=1);

namespace Domain\Articles\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Domain\Articles\DataTransferObjects\ArticleStoreCommentData;
use Domain\Articles\Jobs\StoreArticleCommentJob;
use Domain\Articles\Models\Article;
use Domain\Articles\Requests\API\V1\ArticleStoreCommentRequest;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Symfony\Component\HttpFoundation\Response;

class ArticleStoreCommentController extends Controller
{
    /**
     * @param ArticleStoreCommentRequest $request
     * @param Article $article
     * @return JsonResponse
     * @throws UnknownProperties
     */
    public function __invoke(ArticleStoreCommentRequest $request, Article $article): JsonResponse
    {
        $data = ArticleStoreCommentData::fromRequest($request);

        dispatch(new StoreArticleCommentJob($article, $data));

        return response()->json(['status' => 'success'], Response::HTTP_CREATED);
    }
}
