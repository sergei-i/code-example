<?php

declare(strict_types=1);

namespace Domain\Articles\Controllers;

use App\Http\Controllers\Controller;
use Domain\Articles\Models\Article;
use Domain\Articles\Queries\ArticleIndexQuery;
use Illuminate\Support\Facades\View;
use Illuminate\Contracts\View\View as ViewContract;

class ArticleController extends Controller
{
    public function index(ArticleIndexQuery $query): ViewContract
    {
        $articles = $query->paginate();

        return View::make('app.article.index', compact('articles'));
    }

    public function show(Article $article): ViewContract
    {
        return View::make('app.article.show', compact('article'));
    }
}
