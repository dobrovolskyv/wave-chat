<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PostService
{

    public static function store(array $data): Post
    {
        $post = Post::create($data['post']);
        ImageService::storeBatch($data['images'], $post);
        return $post;
    }
    public static function update(Post $post, array $data): Post
    {
        $post->update($data);
        return $post;
    }


     public static function storeImage(UploadedFile $file): string
     {
        return Storage::disk('public')->put('/images', $file);
     }
}
