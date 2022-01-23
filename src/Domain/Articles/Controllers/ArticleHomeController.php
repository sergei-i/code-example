<?php

declare(strict_types=1);

namespace Domain\Articles\Controllers;

use App\Http\Controllers\Controller;
use Domain\Articles\Queries\ArticleHomeQuery;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Support\Facades\View;

class ArticleHomeController extends Controller
{
    public function __invoke(ArticleHomeQuery $query): ViewContract
    {
        $articles = $query->get();

        return View::make('app.home', compact('articles'));
    }
}
