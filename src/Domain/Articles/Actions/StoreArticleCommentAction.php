<?php

declare(strict_types=1);

namespace Domain\Articles\Actions;

use Domain\Articles\DataTransferObjects\ArticleStoreCommentData;
use Domain\Articles\Models\Article;
use Domain\Comments\Models\Comment;

class StoreArticleCommentAction
{
    public function __invoke(Article $article, ArticleStoreCommentData $data): void
    {
        $comment = new Comment([
            'subject' => $data->subject,
            'body' => $data->body,
        ]);

        $article->comments()->save($comment);
    }
}
