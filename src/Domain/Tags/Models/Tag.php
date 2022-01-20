<?php

declare(strict_types=1);

namespace Domain\Tags\Models;

use Database\Factories\TagFactory;
use Domain\Articles\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['label'];

    public $timestamps = false;

    protected static function newFactory(): Factory
    {
        return TagFactory::new();
    }

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }
}
