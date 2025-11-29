<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Category extends Model
{
    use HasFactory;

    //hasmany
    public function comments(): HasManyThrough
    {
        //надо проверять связи, чтобы в comments был post_id, а в posts category_id
        return $this->hasManyThrough(Comment::class, Post::class);
    }

    //hasOne
    public function comment(): HasOneThrough
    {
        //надо проверять связи, чтобы в comments был post_id, а в posts category_id
        return $this->hasOneThrough(Comment::class, Post::class);
    }
}
