<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Post\PostResource;
use App\Models\Category;
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
        $categories = CategoryResource::collection(Category::all())->resolve();
        return inertia("Admin/Post/Create", compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        // dd($data);
        // $data['profile_id'] = 1;
        // $data['category_id'] = 1;
        $post = Post::create($data);
        return PostResource::make($post)->resolve();
    }
}
