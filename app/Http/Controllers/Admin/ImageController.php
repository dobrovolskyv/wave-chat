<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ImageController extends Controller
{
    public function destroy(Image $image)
    {
        // dd(1111111111);
        Storage::disk('public')->delete($image->path);
        $image->delete();
        return response()->json([
            'message' => 'картинка удалена'
        ], Response::HTTP_OK);
    }
}
