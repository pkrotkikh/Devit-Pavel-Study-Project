<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\ApiLoginRequest;
use App\Http\Requests\Api\Auth\ApiRegisterRequest;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use OpenApi\Attributes as OAT;

/**
 * @OA\Info(title="My First API", version="0.1")
 *
 */
class AuthController extends Controller
{
    // TODO: add authorization
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
                content: new OAT\JsonContent(
                    type: "array",
                    items: new OAT\Items(
                        properties: [
                            new OAT\Property(
                                property:"status",
                                type:"string",
                                example:"success"
                            ),
                            new OAT\Property(
                                property:"message",
                                type:"string",
                                example:"User created successfully"
                            ),
                            new OAT\Property(
                                property:"user",
                                type:"array",
                                items: new OAT\Items(
                                    properties: [
                                        new OAT\Property(
                                            property: "id",
                                            type: "integer",
                                            example: "1",
                                        ),
                                        new OAT\Property(
                                            property: "name",
                                            type: "string",
                                            example: "Joe Doe",
                                        ),
                                        new OAT\Property(
                                            property: "email",
                                            type: "string",
                                            example: "joe.doe@gmail.com",
                                        ),
                                        new OAT\Property(
                                            property: "created_at",
                                            type: "string",
                                            example: "2022-06-25T16:37:59.000000Z",
                                        ),
                                        new OAT\Property(
                                            property: "updated_at",
                                            type: "string",
                                            example: "2022-06-25T16:37:59.000000Z",
                                        ),
                                    ]
                                ),
                            ),
                            new OAT\Property(
                                property:"authorization",
                                type:"array",
                                items: new OAT\Items(
                                    properties: [
                                        new OAT\Property(
                                            property:"token",
                                            type:"string",
                                            example:"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS92MS9hdXRoL2xvZ2luIiwiaWF0IjoxNjU2NDE2NTY4LCJleHAiOjE2NTY0MjAxNjgsIm5iZiI6MTY1NjQxNjU2OCwianRpIjoiZ1BvQ1FOR3Z3b0xsVDdPMSIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.8omuvueL7GbQU8-0icDybWdXSqsRGtbKY6B78Ck0z3E"
                                        ),
                                        new OAT\Property(
                                            property:"type",
                                            type:"string",
                                            example:"jwt"
                                        ),
                                    ]
                                ),
                            )
                        ]
                    )
                )
            ),
            new OAT\Response(
                response: 401,
                description: 'Unauthorized',
                content: new OAT\JsonContent(
                    type: "array",
                    items: new OAT\Items(
                        properties:
                        [
                            new OAT\Property(
                                property:"message",
                                type:"string",
                                example:"Unauthenticated."
                            ),
                        ],
                    ),
                ),
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
            'authorization' => [
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
                content: new OAT\JsonContent(
                    type: "array",
                    items: new OAT\Items(
                        properties: [
                            new OAT\Property(
                                property:"status",
                                type:"string",
                                example:"success"
                            ),
                            new OAT\Property(
                                property:"message",
                                type:"string",
                                example:"You have successfully logged in!"
                            ),
                            new OAT\Property(
                                property:"user",
                                type:"array",
                                items: new OAT\Items(
                                    properties: [
                                        new OAT\Property(
                                            property: "id",
                                            type: "integer",
                                            example: "1",
                                        ),
                                        new OAT\Property(
                                            property: "name",
                                            type: "string",
                                            example: "Joe Doe",
                                        ),
                                        new OAT\Property(
                                            property: "email",
                                            type: "string",
                                            example: "joe.doe@gmail.com",
                                        ),
                                        new OAT\Property(
                                            property: "created_at",
                                            type: "string",
                                            example: "2022-06-25T16:37:59.000000Z",
                                        ),
                                        new OAT\Property(
                                            property: "updated_at",
                                            type: "string",
                                            example: "2022-06-25T16:37:59.000000Z",
                                        ),
                                    ]
                                ),
                            ),
                            new OAT\Property(
                                property:"authorization",
                                type:"array",
                                items: new OAT\Items(
                                    properties: [
                                        new OAT\Property(
                                            property:"token",
                                            type:"string",
                                            example:"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS92MS9hdXRoL2xvZ2luIiwiaWF0IjoxNjU2NDE2NTY4LCJleHAiOjE2NTY0MjAxNjgsIm5iZiI6MTY1NjQxNjU2OCwianRpIjoiZ1BvQ1FOR3Z3b0xsVDdPMSIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.8omuvueL7GbQU8-0icDybWdXSqsRGtbKY6B78Ck0z3E"
                                        ),
                                        new OAT\Property(
                                            property:"type",
                                            type:"string",
                                            example:"jwt"
                                        ),
                                    ]
                                ),
                            )
                        ]
                    )
                )
            ),
            new OAT\Response(
                response: 401,
                description: 'Unauthorized',
                content: new OAT\JsonContent(
                    type: "array",
                    items: new OAT\Items(
                        properties:
                        [
                            new OAT\Property(
                                property:"message",
                                type:"string",
                                example:"Unauthenticated."
                            ),
                        ],
                    ),
                ),
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
            'message' => 'You have successfully logged in!',
            'user' => $user,
            'authorization' => [
                'token' => $token,
                'type' => 'jwt',
            ]
        ], 200);
    }
}
