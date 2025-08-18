<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\API\LoginRequest;
use App\Http\Resources\RegisterResource;
use App\Http\Requests\API\RegisterRequest;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Auth",
 *     description="Authentication endpoints"
 * )
 */
class AuthController extends Controller
{

    /**
     * @OA\Post(
     *     path="/api/register",
     *     tags={"Auth"},
     *     summary="Customer Registration",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name","email","password","password_confirmation"},
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="password", type="string"),
     *             @OA\Property(property="password_confirmation", type="string")
     *         )
     *     ),
     *     @OA\Response(response=201, description="User registered successfully"),
     *     @OA\Response(response=400, description="Bad Request")
     * )
     */
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

    /**
     * @OA\Post(
     *     path="/api/login",
     *     tags={"Auth"},
     *     summary="User Login",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email","password"},
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="password", type="string")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Login successful"),
     *     @OA\Response(response=401, description="Invalid credentials")
     * )
     */
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->responseJson('error','Invalid credentials',null,401);
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

    /**
     * @OA\Post(
     *     path="/api/v1/logout",
     *     tags={"Auth"},
     *     summary="User Logout",
     *     security={{"sanctum":{}}},
     *     @OA\Response(response=200, description="Logged out successfully")
     * )
     */
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return $this->responseJson('success','Logged out');
    }

}
