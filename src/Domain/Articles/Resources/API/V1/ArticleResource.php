<?php

declare(strict_types=1);

namespace Domain\Articles\Resources\API\V1;

use Domain\Articles\Models\Article;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    public int $id;

    public string $title;

    public string $image;

    public string $content;

    public string $createdAt;

    public CounterResource $counter;

    public TagResourceCollection $tags;

    public CommentResourceCollection $comments;

    public function __construct(Article $article)
    {
        parent::__construct($article);

        $this->id = $article->id;
        $this->title = $article->title;
        $this->image = $article->image;
        $this->content = $article->content;
        $this->createdAt = $article->created_at_for_humans;

        $this->counter = new CounterResource($this->whenLoaded('counter'));
        $this->tags = new TagResourceCollection($this->whenLoaded('tags'));
        $this->comments = new CommentResourceCollection($this->whenLoaded('comments'));
    }

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => $this->image,
            'content' => $this->content,
            'createdAt' => $this->createdAt,
            'counter' => $this->counter,
            'tags' => $this->tags,
            'comments' => $this->comments,
        ];
    }
}
