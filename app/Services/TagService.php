<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class TagService
{
    public static function storeBatch(string $data): Collection
    {
        $tagsArr = explode(',', $data);
        $tags = [];
        foreach ($tagsArr as $tagsTitle) {
            $tags[] = Tag::firstOrCreate(['title' => $tagsTitle]);
        }

        return collect($tags);
    }

}
 