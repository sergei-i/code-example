<?php

declare(strict_types=1);

namespace Domain\Articles\Controllers;

use App\Http\Controllers\Controller;
use Domain\Articles\Queries\ArticleTagQuery;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Support\Facades\View;

class ArticleTagController extends Controller
{
    public function __invoke(ArticleTagQuery $query): ViewContract
    {
        $articles = $query->paginate();

        return View::make('app.article.by_tag', compact('articles'));
    }
}
