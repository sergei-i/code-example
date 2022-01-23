<?php

declare(strict_types=1);

namespace Domain\Articles\Models;

use Database\Factories\ArticleFactory;
use Domain\Comments\Models\Comment;
use Domain\Counters\Models\Counter;
use Domain\Tags\Models\Tag;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'image'];

    protected $perPage = 9;

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

    protected function contentPreview(): Attribute
    {
        return new Attribute(
            get: fn() => Str::limit($this->content, 200),
        );
    }

    public function createdAtForHumans(): Attribute
    {
        return new Attribute(
            get: fn() => $this->created_at->diffForHumans(),
        );
    }
}
