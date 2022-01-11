<?php

namespace Database\Factories;

use Domain\Articles\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(10);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraph(100),
            'image' => config('services.placeholder_url'),
            'created_at' => $this->faker->dateTimeBetween('-1 years'),
        ];
    }
}
