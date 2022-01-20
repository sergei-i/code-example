<?php

declare(strict_types=1);

namespace Domain\Articles\Queries;

use Domain\Articles\Models\Article;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class ArticleIndexQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Article::with(['counter', 'tags'])->latest();

        parent::__construct($query, $request);
    }
}
