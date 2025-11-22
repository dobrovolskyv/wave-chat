<?php

namespace App\Services;

use App\Models\Comment;

class CommentService
{
    /**
     * Create a new class instance.
     */
    public static function update(Comment $comment, array $data): Comment
    {
        $comment->update($data);
        return $comment;
    }

    public static function store(array $data):Comment
    {   
        return Comment::create($data);
    }
}
