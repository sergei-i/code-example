<?php

declare(strict_types=1);

namespace Domain\Articles\Actions;

use Domain\Articles\Models\Article;

class IncrementArticleLikeAction
{
    public function __invoke(Article $article): void
    {
        $article->counter->increment('likes');
    }
}
