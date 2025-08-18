<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\API\LoginRequest;
use App\Http\Resources\RegisterResource;
use App\Http\Requests\API\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $collection = collect($request->validated());
        $collection = $collection->merge(['role_name'=>CUSTOMER_ROLE]);

        $user = User::create($collection->all());

        $token = $user->createToken('auth_token')->plainTextToken; // token generate

        return $this->responseJson(
            'success',
            'Registration successful',
            [
                'user' => new RegisterResource($user),
                'access_token' => $token,
                'token_type' => 'Bearer',
            ],
            201
        );
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->role(CUSTOMER_ROLE)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->responseJson(
                'error',
                'Invalid credentials',
                null,
                401
            );
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->responseJson(
            'success',
            'Login successful',
            [
                'user'         => new RegisterResource($user),
                'access_token' => $token,
                'token_type'   => 'Bearer',
            ]
        );
    }

}
