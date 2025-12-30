<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Api\Post\IndexRequest;
use App\Http\Requests\Api\Post\StoreRequest;
use App\Http\Requests\Api\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index(IndexRequest $request)
    {

        $data = $request->validated();
        $posts = Post::filter($data)->get();

        return PostResource::collection($posts)->resolve();
        // $posts = Post::query();
        // $posts= (new PostFilter())->apply($posts, $data);

        //делаем проверку на наличике такого поля
        // if (isset($data['profile_id'])) {
        //     $posts->where('profile_id', $data['profile_id']);
        // }
        // if (isset($data['category_id'])) {
        //     $posts->where('category_id', $data['category_id']);
        // }
        // if (isset($data['title'])) {
        //     $value = $data['title'];
        //     $posts->where('title', 'ilike', "%$value%");
        // }
        // if (isset($data['content'])) {
        //     $value = $data['content'];
        //     $posts->where('content', 'ilike', "%$value%");
        // }
        // //будет искать не по полным словам
        // if (isset($data['category_title'])) {
        //     $value = $data['category_title'];
        //     $posts->whereRelation('category', 'title', 'ilike', "%$value%");
        //     //или так
        //     // $post->whereHas('category', function(Builder $builder) use ($valuie){
        //     //     $builder->where('title', 'ilike', "%$value%");
        //     // })
        // }
        // if (isset($data['published_at_from'])) {
        //     $posts->where('published_at', ">=", $data['published_at_from']);
        // }
        // if (isset($data['published_at_to'])) {
        //     $posts->where('published_at', '=<', $data['published_at_to']);
        // }
        // if (isset($data['views_from'])) {
        //     $posts->where('views', ">=", $data['views_from']);
        // }
        // if (isset($data['views_to'])) {
        //     $posts->where('views', "=<", $data['views_to']);
        // }

        // $posts = $posts->get();

    }
    public function show(Post $post)
    {
        return PostResource::make($post)->resolve();
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $post = Post::create($data);
        return PostResource::make($post)->resolve();
    }

    public function update(Post $post, UpdateRequest $request)
    {
        $data = $request->validated();
        $post = PostService::update($post, $data);
        return PostResource::make($post)->resolve();

    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            'message' => 'success'
        ], Response::HTTP_OK);
    }
}
