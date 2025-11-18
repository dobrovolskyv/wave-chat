<?php

namespace App\Http\Resources\Comment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'author' => $this->author,
            'post' => $this->post,
            'content' => $this->content,
            'likes' => $this->likes,
            'reply' => $this->reply
        ];
    }
}
