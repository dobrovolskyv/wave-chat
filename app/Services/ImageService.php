<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public static function storeBatch(array $data, Model $model):void
    {
        $imagePaths = [];
        foreach($data as $image){
            $imagePaths[]= ['path' => self::storageImage($image)];
        }

        $model->images()->createmany($imagePaths);
    }

    public static function storageImage(UploadedFile $file): string
    {
        return Storage::disk('public')->put('/images', $file);
    }
}
