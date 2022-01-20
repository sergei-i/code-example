<?php

declare(strict_types=1);

namespace Domain\Comments\Models;

use Database\Factories\CommentFactory;
use Domain\Articles\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'body', 'article_id'];

    protected static function newFactory(): Factory
    {
        return CommentFactory::new();
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
