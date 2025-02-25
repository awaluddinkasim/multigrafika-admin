<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get(Request $request): JsonResponse
    {
        return response()->json([
            'message' => 'User fetched successfully',
            'user' => $request->user()
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $user = User::find($request->user()->id);

        if ($request->password) {
            $user->update([
                'password' => bcrypt($request->password)
            ]);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return response()->json([
            'message' => 'User updated successfully'
        ]);
    }
}
