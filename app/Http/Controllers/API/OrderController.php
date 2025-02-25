<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function get(Request $request): JsonResponse
    {
        $user = $request->user();

        $orders = $user->orders()->get();

        return response()->json([
            'message' => 'Orders fetched successfully',
            'data' => [
                'orders' => OrderResource::collection($orders)
            ]
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $order = new Order();

        $order->user_id = $request->user()->id;
        $order->sticker_id = $request->sticker_id;
        $order->price = $request->price;
        $order->freelance_price = $request->freelance_price;
        $order->status = 'pending';

        $order->save();

        return response()->json([
            'message' => 'Order created successfully',
            'data' => [
                'order' => new OrderResource($order)
            ]
        ]);
    }

    public function cancel(Request $request, Order $order): JsonResponse
    {
        $order->update([
            'status' => 'cancelled'
        ]);

        return response()->json([
            'message' => 'Order cancelled successfully'
        ]);
    }
}
