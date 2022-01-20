<?php

declare(strict_types=1);

namespace Domain\Articles\Requests\API\V1;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreCommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'subject' => ['required', 'string', 'min:6'],
            'body' => ['required', 'string', 'min:10'],
        ];
    }
}
