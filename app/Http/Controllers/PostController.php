<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Post;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(Post::all())->resolve();
    } 

    public function show(Post $post)
    {
        return PostResource::make($post)->resolve();
    }

    public function store()
    {
        $data = [
            'author' => 1123,
            'category' => 15,
            'title' => "titl"
        ];
        $post = Post::create($data);

        return $post;
    }

    public function update(Post $post)
    {

        $post->update([
            'title' => 'post456'
        ]);

        return $post;
    }

    public function destroy(Post $post)
    {
        $post = Post::findOrFail($post);
        $post->delete();
        return response()->json([
            'message' => 'success'
        ], Response::HTTP_OK);
    }
}
