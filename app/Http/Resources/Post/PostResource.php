<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            "author" => $this->author,
            "title"=> $this->title,
            "content" => $this->content,
            "image_path" => $this->image_path,
            "published_at" => $this->published_at,
            "views" => $this->views
        ];
    }
}
