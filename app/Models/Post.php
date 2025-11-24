<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function comments()
    {
    //        return $this->morphMany(Comment::class, 'commentable');
        return $this->hasMany(Comment::class);
    }
}
