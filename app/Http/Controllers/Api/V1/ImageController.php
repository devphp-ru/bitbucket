<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ImageController extends Controller
{
    public function index(): JsonResponse
    {
        $images = Image::orderByDesc('id')->get();

        return response()->json([
            'status' => true,
            'data' => ImageResource::collection($images),
        ])->setStatusCode(Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $image = Image::findOrFail($id);

        return response()->json([
            'status' => true,
            'data' => new ImageResource($image),
        ])->setStatusCode(Response::HTTP_OK);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

}
