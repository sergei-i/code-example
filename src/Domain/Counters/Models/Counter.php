<?php

declare(strict_types=1);

namespace Domain\Counters\Models;

use Database\Factories\CounterFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;

    protected $fillable = ['likes', 'views', 'article_id'];

    public $timestamps = false;

    protected static function newFactory(): Factory
    {
        return CounterFactory::new();
    }
}
