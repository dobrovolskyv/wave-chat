<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;


class PostController extends Controller
{
    public function index()
    {
        $posts = PostResource::collection(Post::all())->resolve();
        return inertia('Admin/Post/Index', compact('posts'));
    }

    public function create()
    {
        return inertia("Admin/Post/Create");
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['profile_id'] = 1;
        $data['category_id'] = 1;
        $post = Post::create($data);
        
        return PostResource::make($post)->resolve();
    }
}
