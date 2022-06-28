<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use OpenApi\Attributes as OAT;


class UserController extends Controller
{
    #[OAT\Get(
        path: '/api/v1/users/profile',
        description: "Get logged in users' information",
        tags: ['User'],
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
                securityScheme: "passport",
                type: "apiKey",
                description: "Authorization",
                name: "Authorization",
                in: "header",
                bearerFormat: "bearer"
            )
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
}
