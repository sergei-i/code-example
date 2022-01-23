<?php

declare(strict_types=1);

namespace Domain\Articles\DataTransferObjects;

use Domain\Articles\Requests\API\V1\ArticleStoreCommentRequest;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ArticleStoreCommentData extends DataTransferObject
{
    public string $subject;

    public string $body;

    /**
     * @param ArticleStoreCommentRequest $request
     * @return ArticleStoreCommentData
     * @throws UnknownProperties
     */
    public static function fromRequest(ArticleStoreCommentRequest $request): ArticleStoreCommentData
    {
        return new self([
            'subject' => $request->input('subject'),
            'body' => $request->input('body'),
        ]);
    }
}
