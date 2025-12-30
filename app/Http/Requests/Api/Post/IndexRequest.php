<?php

namespace App\Http\Requests\Api\Post;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'profile_id' => 'nullable|integer|exists:profiles,id',
            'title' => 'nullable|string',
            'category_id' => 'nullable|integer',
            'views_from' => 'nullable|integer|min:0',
            'published_at_from' => 'nullable|date_format:Y-m-d H:i:s',
        ];
    }
}


