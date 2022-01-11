<?php

namespace Database\Factories;

use Domain\Counters\Models\Counter;
use Illuminate\Database\Eloquent\Factories\Factory;

class CounterFactory extends Factory
{
    protected $model = Counter::class;

    public function definition(): array
    {
        return [
            'likes' => $this->faker->numberBetween(1, 10),
            'views' => $this->faker->numberBetween(1, 100),
        ];
    }
}
