<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\StickerResource;
use App\Models\Sticker;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StickerController extends Controller
{
    public function get(): JsonResponse
    {
        $stickers = Sticker::all();

        return response()->json([
            'message' => 'Stickers fetched successfully',
            'data' => [
                'stickers' => StickerResource::collection($stickers)
            ]
        ]);
    }
}
