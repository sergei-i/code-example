<?php

declare(strict_types=1);

namespace Domain\Articles\Resources\API\V1;

use Domain\Tags\Models\Tag;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class TagResource extends JsonResource
{
    public int $id;

    public string $label;

    public function __construct(Tag $comment)
    {
        parent::__construct($comment);

        $this->id = $comment->id;
        $this->label = Str::ucfirst($comment->label);
    }

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'label' => $this->label,
        ];
    }
}
