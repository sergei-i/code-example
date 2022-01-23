<?php

declare(strict_types=1);

namespace Domain\Articles\Jobs;

use Domain\Articles\Actions\StoreArticleCommentAction;
use Domain\Articles\DataTransferObjects\ArticleStoreCommentData;
use Domain\Articles\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreArticleCommentJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        private Article $article,
        private ArticleStoreCommentData $data,
    ) {
    }

    public function handle(StoreArticleCommentAction $action): void
    {
        $action($this->article, $this->data);
    }
}
