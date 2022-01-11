<?php

namespace Database\Factories;

use Domain\Comments\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'subject' => $this->faker->sentence(3),
            'body' => $this->faker->paragraph,
        ];
    }
}
