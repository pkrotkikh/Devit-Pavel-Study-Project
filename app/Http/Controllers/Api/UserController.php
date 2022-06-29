<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use OpenApi\Attributes as OAT;


class UserController extends Controller
{
    #[OAT\Get(
        path: '/api/v1/users/profile',
        description: "Get users' profile information",
        security: [
            new OAT\SecurityScheme(
                securityScheme: "oauth2",
                type: "oauth2",
                description: "Authorization",
                name: "Authorization",
                in: "header",
                bearerFormat: "bearer"
            )
        ],
        tags: ['User'],
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
                                example:"User information"
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
    public function profile() {
        $user = Auth::user();

        return response()->json([
            'status' => 'success',
            'message' => 'User information',
            'user' => $user,
        ]);
    }

    #[OAT\Get(
        path: '/api/v1/users/{user_id}',
        description: "Get other users' profile information",
        security: [
            new OAT\SecurityScheme(
                securityScheme: "passport",
                type: "apiKey",
                description: "Authorization",
                name: "Authorization",
                in: "header",
                bearerFormat: "bearer"
            )
        ],
        tags: ['User'],
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
                                example:"User information"
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
    public function otherProfile ($user_id)
    {
        $user = User::find($user_id);

        return $user;
    }

    #[OAT\Get(
        path: '/api/v1/users/{user_id}/tweets',
        description: "Show users' tweets",
        tags: ['User'],
        parameters: [
            new OAT\Parameter(
                name: 'user_id',
                description: 'User identification',
                in: 'path',
                required: true,
                schema: new OAT\Schema(
                    type: "integer",
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
                        properties:
                        [
                            new OAT\Property(
                                property: "id",
                                type: "integer",
                                example: "1",
                            ),
                            new OAT\Property(
                                property: "author_id",
                                type: "integer",
                                example: "1",
                            ),
                            new OAT\Property(
                                property: "parent_id",
                                type: "integer",
                                example: "2",
                            ),
                            new OAT\Property(
                                property: "retweet_id",
                                type: "integer",
                                example: "3",
                            ),
                            new OAT\Property(
                                property: "text",
                                type: "string",
                                example: "Sample Text",
                            ),
                            new OAT\Property(
                                property: "created_at",
                                type: "string",
                                example: "2022-06-28T09:48:36.000000Z",
                            ),
                            new OAT\Property(
                                property: "updated_at",
                                type: "string",
                                example: "2022-06-28T09:48:36.000000Z",
                            ),
                        ],
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
    public function userTweets($user_id)
    {
        $user = User::find($user_id);
        $tweets = $user->tweets;

        return $tweets;
    }
}
