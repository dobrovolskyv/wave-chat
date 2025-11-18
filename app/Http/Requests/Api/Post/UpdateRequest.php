<?php

namespace App\Http\Requests\Api\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'author' => 'required|integer',
            'category' => 'required|integer',
            'title' => 'required|string|unique:posts,title,' . $this->post->id,
            'content' => 'nullable|string',
            'image_path' => 'nullable|string',
            'published_at' => 'nullable|date_format:Y-m-d H:i:s',
            'status' => 'nullable|integer|in:1,2,3,4',
            'is_active' => 'nuallable|boolean',
            'likes' => 'nullable|integer|min:0',
            'views' => 'nullable|integer|min:0',
        ];
    }
}
