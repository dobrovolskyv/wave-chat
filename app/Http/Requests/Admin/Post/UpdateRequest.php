<?php

namespace App\Http\Requests\Admin\Post;

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
            'post.title' => 'required|string',
            'post.profile_id' => 'required|integer|exists:profiles,id',
            'post.content' => 'nullable|string',
            'post.published_at' => 'nullable|date_format:Y-m-d',
            'post.category_id' => 'required|integer|exists:categories,id',
            'images' => 'nullable|array',
            'tags' => 'nullable|string'
        ];
    }

    protected function prepareForValidation()
    {
        return $this->merge([
            'images' => $this->images ?? []
        ]);
    }


}
