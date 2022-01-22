<?php

declare(strict_types=1);

namespace Domain\Articles\Actions;

use Domain\Articles\Models\Article;
use Support\Exceptions\ConflictException;
use Throwable;

class DecrementArticleLikeAction
{
    /**
     * @param Article $article
     * @return void
     * @throws Throwable
     */
    public function __invoke(Article $article): void
    {
        $this->validate($article);

        $this->decrementLikeCount($article);
    }

    /**
     * @param Article $article
     * @return void
     * @throws Throwable
     */
    private function validate(Article $article): void
    {
        throw_unless(
            $this->isLikesCountValid($article),
            new ConflictException('You cannot decrease the number of likes when their number is less than one')
        );
    }

    private function isLikesCountValid(Article $article): bool
    {
        return $article->counter->likes > 0;
    }

    private function decrementLikeCount(Article $article): void
    {
        $article->counter->decrement('likes');
    }
}
