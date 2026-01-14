<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{

    public static function store(array $data): Post
    {
        try {
            DB::beginTransaction();
            $post = Post::create($data['post']);
            ImageService::storeBatch($data['images'], $post);
            $tags = TagService::storeBatch($data['tags']);
            $post->tags()->sync($tags->pluck('id'));
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }

        return $post;
    }
    public static function update(Post $post, array $data): Post
    {
        try {
            DB::beginTransaction();
            ImageService::storeBatch($data['images'], $post);
            $tags = TagService::storeBatch($data['tags']);
            $post->tags()->sync($tags->pluck('id'));
            $post->update($data['post']);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }

        return $post;
    }


    public static function storeImage(UploadedFile $file): string
    {
        return Storage::disk('public')->put('/images', $file);
    }
}
