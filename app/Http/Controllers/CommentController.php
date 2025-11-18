<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    public function index()
    {
        return Comment::all();
    }

    public function show(Comment $comment)
    {

        return $comment;
    }

    public function store()
    {
        $data = [
            'author' => '2',
            'post' => 2,
            'content' => 'dsfs',
            'likes' => 2,
            'reply' => 3
        ];
        $comment = Comment::create($data);

        return $comment;
    }

    public function update(Comment $comment)
    {
        $comment->update([
            'content' => 'lorem20'
        ]);
        return $comment;
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json([
            'success'=> 'ok'
        ], Response::HTTP_OK);
    }
}
