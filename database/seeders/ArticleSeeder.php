<?php

declare(strict_types=1);

namespace Database\Seeders;

use Domain\Articles\Models\Article;
use Domain\Comments\Models\Comment;
use Domain\Counters\Models\Counter;
use Domain\Tags\Models\Tag;
use Exception;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run(): void
    {
        $tags = Tag::all();

        $articles = Article::factory(20)
            ->has(Counter::factory())
            ->create();

        $articles->each(
            function (Article $article) use ($tags) {
                $article->comments()->saveMany(Comment::factory()->count(random_int(1, 5))->make());
                $article->tags()->attach($tags->random(random_int(1, 3)));
            }
        );
    }
}
