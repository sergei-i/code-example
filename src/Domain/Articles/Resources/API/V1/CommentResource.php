<?php

declare(strict_types=1);

namespace Domain\Articles\Resources\API\V1;

use Domain\Comments\Models\Comment;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public int $id;

    public string $subject;

    public string $body;

    public string $createdAt;

    public function __construct(Comment $comment)
    {
        parent::__construct($comment);

        $this->id = $comment->id;
        $this->subject = $comment->subject;
        $this->body = $comment->body;
        $this->createdAt = $comment->created_at->diffForHumans();
    }

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'subject' => $this->subject,
            'body' => $this->body,
            'created_at' => $this->createdAt,
        ];
    }
}
