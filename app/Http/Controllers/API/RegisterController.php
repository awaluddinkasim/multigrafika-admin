<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validate = User::where('email', $request->email)->first();

        if ($validate) {
            return response()->json([
                'message' => 'User with this email already exists'
            ]);
        }

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;

        $user->save();

        if (!$user) {
            return response()->json([
                'message' => 'User registration failed'
            ]);
        }

        return response()->json([
            'message' => 'User registered successfully'
        ]);
    }
}
