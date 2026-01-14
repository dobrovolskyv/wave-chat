<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Image\ImageResource;
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
            'id' => $this->id,
            // "profile_id" => $this->profile_id,
            'author' => $this->author,
            // 'category' => CategoryResource::make($this->category)->resolve(),
            // 'catgegory_title' => $this->category_title,
            "title" => $this->title,
            "content" => $this->content,
            "image_path" => $this->image_path,
            'images' => ImageResource::collection($this->images)->resolve(),
            "published_at" => $this->published_at,
            "views" => $this->views
        ];
    }
}
