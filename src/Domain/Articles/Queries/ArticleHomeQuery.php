<?php

declare(strict_types=1);

namespace Domain\Articles\Queries;

use Domain\Articles\Models\Article;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ArticleHomeQuery extends QueryBuilder
{
    private const MAX_QUANTITY = 6;

    public function __construct(Request $request)
    {
        $query = Article::with(['counter', 'tags'])
            ->latest()
            ->limit(self::MAX_QUANTITY);

        parent::__construct($query, $request);
    }
}
