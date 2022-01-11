<?php

namespace Domain\Articles\Models;

use Database\Factories\ArticleFactory;
use Domain\Comments\Models\Comment;
use Domain\Counters\Models\Counter;
use Domain\Tags\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'image'];

    protected static function newFactory(): Factory
    {
        return ArticleFactory::new();
    }

    public function counter(): HasOne
    {
        return $this->hasOne(Counter::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
