<?php

namespace App\Http\Requests\Api\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'profile_id' => 'required|integer',
            'category_id' => 'required|integer',
            'title' => 'required|string',
            'content' => 'nullable|string',
            'image_path' => 'nullable|string',
            'published_at' => 'nullable|date_format:Y-m-d H:i:s',
            'status' => 'nullable|integer|in:1,2,3,4',
            'is_active' => 'nullable|boolean',
            'likes' => 'nullable|integer|min:0',
            'views' => 'nullable|integer|min:0',
        ];
    }
}
