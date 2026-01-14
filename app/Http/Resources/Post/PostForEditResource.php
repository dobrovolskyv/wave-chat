<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Image\ImageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostForEditResource extends JsonResource
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
            "profile_id" => $this->profile_id,
            // 'author' => $this->author,
            // category может быть null, поэтому обрабатываем это безопасно
            'category' => $this->when(
                $this->category,
                fn () => CategoryResource::make($this->category)->resolve()
            ),
            'catgegory_title' => $this->category_title,
            'category_id' => $this->category_id,
            "title" => $this->title,
            "content" => $this->content,
            "views" => $this->views,
            "image_path" => $this->image_path,
            'images' => ImageResource::collection($this->images)->resolve(),
            // "published_at" => $this->published_at,
            "published_at" => now()->toDateString(),
            "tags_as_string" => $this->tags_as_string,
            "status"=>$this->status,
            "is_active"=>$this->is_active
        ];
    }
}
