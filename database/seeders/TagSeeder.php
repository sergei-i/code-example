<?php

namespace Database\Seeders;

use Domain\Tags\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        Tag::factory(10)->create();
    }
}
