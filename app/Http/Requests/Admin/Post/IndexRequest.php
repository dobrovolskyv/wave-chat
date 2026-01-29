<?php

namespace App\Http\Requests\Admin\Post;

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
            // 'profile_id' => 'nullable|integer|exists:profiles,id',
            'filter.title' => 'nullable|string',
            'filter.category_id' => 'nullable|integer',
            'filter.views_from' => 'nullable|integer|min:0',
            'filter.published_at_from' => 'nullable|date_format:Y-m-d H:i:s',
            'pagination.page' => 'required|integer',
            'pagination.per_page' => 'required|integer'
        ];
    }

    protected function prepareForValidation()
    {
        return $this->merge([
            'pagination' => [
                'page' => $this->page ?? 1,
                'per_page' => $this->per_page ?? 10
            ]
        ]);
    }
}



