<?php

declare(strict_types=1);

namespace Database\Factories;

use Domain\Tags\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition(): array
    {
        return [
            'label' => $this->faker->words(
                $this->faker->numberBetween(1, 2),
                true
            ),
        ];
    }
}
