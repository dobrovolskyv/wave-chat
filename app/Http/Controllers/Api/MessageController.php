<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Message\StoreRequest;
use App\Http\Requests\Api\Message\UpdateRequest;
use App\Http\Resources\Message\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MessageResource::collection(Message::all())->resolve();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        $data = $request->validated();
        return MessageResource::make(Message::create($data))->resolve();
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        return MessageResource::make($message)->resolve();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Message $message)
    {
        $data = $request->validated();
        $message->update($data);
        return MessageResource::make($message)->resolve();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return response()->json([
            'message' => 'success'
        ], Response::HTTP_OK);
    }
}
