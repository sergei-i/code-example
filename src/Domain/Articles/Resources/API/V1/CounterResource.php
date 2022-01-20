<?php

declare(strict_types=1);

namespace Domain\Articles\Resources\API\V1;

use Domain\Counters\Models\Counter;
use Illuminate\Http\Resources\Json\JsonResource;

class CounterResource extends JsonResource
{
    public int $likes;

    public int $views;

    public function __construct(Counter $counter)
    {
        parent::__construct($counter);

        $this->likes = $counter->likes;
        $this->views = $counter->views;
    }

    public function toArray($request): array
    {
        return [
            'likes' => $this->likes,
            'views' => $this->views,
        ];
    }
}
