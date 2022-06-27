<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLoginRequest;
use App\Http\Requests\ApiRegisterRequest;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use OpenApi\Attributes as OAT;

/**
 * @OA\Info(title="My First API", version="0.1")
 *
 */
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    #[OAT\Post(
        path: '/api/v1/auth/register',
        description: "Register user",
        tags: ['Auth'],
        parameters: [
            new OAT\Parameter(
                name: 'name',
                description: 'User name.',
                in: 'query',
                required: true,
                schema: new OAT\Schema(
                    type: "string",
                )
            ),
            new OAT\Parameter(
                name: 'email',
                description: 'User email.',
                in: 'query',
                required: true,
                schema: new OAT\Schema(
                    type: "string",
                )
            ),
            new OAT\Parameter(
                name: 'password',
                description: 'User password.',
                in: 'query',
                required: true,
                schema: new OAT\Schema(
                    type: "string",
                )
            ),
        ],
        responses: [
            new OAT\Response(
                response: 200,
                description: 'Success',
                content: new OAT\JsonContent()
            ),
            new OAT\Response(
                response: 401,
                description: 'Unauthorized',
                content: new OAT\JsonContent()
            ),
        ]
    )]
    public function register(ApiRegisterRequest $request, UserRepositoryInterface $userRepository){
        $user = $userRepository->createUser($request);
        $token = Auth::login($user);

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'jwt',
            ]
        ]);
    }

    #[OAT\Post(
        path: '/api/v1/auth/login',
        description: "Login user",
        tags: ['Auth'],
        parameters: [
            new OAT\Parameter(
                name: 'email',
                description: 'User email.',
                in: 'query',
                required: true,
                schema: new OAT\Schema(
                    type: "string",
                )
            ),
            new OAT\Parameter(
                name: 'password',
                description: 'User password.',
                in: 'query',
                required: true,
                schema: new OAT\Schema(
                    type: "string",
                )
            ),
        ],
        responses: [
            new OAT\Response(
                response: 200,
                description: 'Success',
                content: new OAT\JsonContent()
            ),
            new OAT\Response(
                response: 401,
                description: 'Unauthorized',
                content: new OAT\JsonContent()
            ),
        ]
    )]
    public function login(ApiLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $token = Auth::attempt($credentials);

        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();

        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'jwt',
            ]
        ], 200);
    }

    #[OAT\Get(
        path: '/api/v1/auth/me',
        description: "Get logged in users' information",
        tags: ['Auth'],
        responses: [
            new OAT\Response(
                response: 200,
                description: 'Success',
                content: new OAT\JsonContent()
            ),
            new OAT\Response(
                response: 401,
                description: 'Unauthorized',
                content: new OAT\JsonContent()
            ),
        ],
        security: [
            new OAT\SecurityScheme(
                securityScheme: "bearer_token",
                type: "apiKey",
                description: "Authorization",
                name: "Authorization",
                in: "header",
                bearerFormat: "bearer"
            )
        ]
    )]
    public function me() {
        $user = Auth::user();

        return response()->json([
            'status' => 'success',
            'message' => 'User information',
            'user' => $user,
        ]);
    }
}
