<?php

namespace App\Http\Controllers;

use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    public function index()
    {
        return ProfileResource::collection(Profile::all())->resolve();
    }

    public function show(Profile $profile)
    {
        return $profile;
    }
    public function store()
    {
        $data = [
            'name' => '433',
            'last_name' => 'database -4343434',
            'gender' => 'female',
            // 'user_id' => 1,

        ];
        $profile = Profile::create($data);

        return $profile;
    }

    public function update(Profile $profile)
    {
        $profile->update([
            'first_name' => 'oleg',
        ]);
        return $profile;
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return response()->json([
            'message' => 'success'
        ], Response::HTTP_OK);
    }

}
