<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Tweet\TweetRequest;
use App\Http\Requests\TweetUpdateRequest;
use App\Models\Tweet;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use OpenApi\Attributes as OAT;

class TweetController extends Controller
{
    #[OAT\Get(
        path: '/api/v1/tweets',
        description: "All tweet",
        tags: ['Tweet'],
        responses: [
            new OAT\Response(
                response: 200,
                description: 'Success',
                content: new OAT\JsonContent(
                    type: "array",
                    items: new OAT\Items(
                        properties: [
                            new OAT\Property(
                                property:"tweets",
                                type:"array",
                                items: new OAT\Items(
                                    properties: [
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
                        ],
                    ),
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
    public function index() : Collection
    {
        $tweets = Tweet::with("author")->get();

        return $tweets;
    }

    #[OAT\Get(
        path: '/api/v1/tweets/{id}',
        description: "Show tweet",
        tags: ['Tweet'],
        parameters: [
            new OAT\Parameter(
                name: 'tweet_id',
                description: 'Tweet identification',
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
    public function show($id) :Tweet
    {
        $tweet = Tweet::whereId($id)->first();

        return $tweet;
    }

    #[OAT\Post(
        path: '/api/v1/tweets/',
        description: "Store tweet",
        tags: ['Tweet'],
        parameters: [
            new OAT\Parameter(
                name: 'text',
                description: 'Tweet text',
                in: 'query',
                required: true,
                schema: new OAT\Schema(
                    type: "string",
                )
            ),
            new OAT\Parameter(
                name: 'parent_id',
                description: 'To which tweet attach comment',
                in: 'query',
                required: false,
                schema: new OAT\Schema(
                    type: "integer",
                )
            ),
            new OAT\Parameter(
                name: 'retweet_id',
                description: 'ID of the tweet from which we make a new tweet',
                in: 'query',
                required: false,
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
                                property:"status",
                                type:"string",
                                example:"success"
                            ),
                            new OAT\Property(
                                property:"message",
                                type:"string",
                                example:"Tweet created successfully"
                            ),
                            new OAT\Property(
                                property:"tweet",
                                type:"array",
                                items: new OAT\Items(
                                    properties: [
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
    public function store(TweetRequest $request) : JsonResponse
    {
        $request->merge(['author_id' => Auth::id()]);
        $tweet = Tweet::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Tweet created successfully',
            'tweet' => $tweet,
        ]);
    }

    #[OAT\Put(
        path: '/api/v1/tweets/{id}',
        description: "Update tweet",
        tags: ['Tweet'],
        parameters: [
            new OAT\Parameter(
                name: 'id',
                description: 'Tweet identifier',
                in: 'query',
                required: true,
                schema: new OAT\Schema(
                    type: "integer",
                )
            ),
            new OAT\Parameter(
                name: 'text',
                description: 'Tweet text',
                in: 'query',
                required: true,
                schema: new OAT\Schema(
                    type: "string",
                )
            ),
            new OAT\Parameter(
                name: 'parent_id',
                description: 'To which tweet attach comment',
                in: 'query',
                required: false,
                schema: new OAT\Schema(
                    type: "integer",
                )
            ),
            new OAT\Parameter(
                name: 'retweet_id',
                description: 'ID of the tweet from which we make a new tweet',
                in: 'query',
                required: false,
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
                                property:"status",
                                type:"string",
                                example:"success"
                            ),
                            new OAT\Property(
                                property:"message",
                                type:"string",
                                example:"Tweet created successfully"
                            ),
                            new OAT\Property(
                                property:"tweet",
                                type:"array",
                                items: new OAT\Items(
                                    properties: [
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
    public function update(TweetUpdateRequest $request, $id) : JsonResponse
    {
        $user = Auth::user();
        $tweet = $user->tweets()->whereId($id)->first();
        $tweet->update($request->only(["text"]));

        return response()->json([
            'status' => 'success',
            'message' => 'Tweet updated successfully',
            'tweet' => $tweet,
        ]);
    }

    #[OAT\Delete(
        path: '/api/v1/tweets/{id}',
        description: "Delete tweet",
        tags: ['Tweet'],
        parameters: [
            new OAT\Parameter(
                name: 'id',
                description: 'Tweet identifier',
                in: 'query',
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
                                property:"status",
                                type:"string",
                                example:"success"
                            ),
                            new OAT\Property(
                                property:"message",
                                type:"string",
                                example:"Tweet deleted successfully"
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
    public function delete($id) : JsonResponse
    {
        $user = Auth::user();
        $tweet = $user->tweets()->whereId($id)->first();
        $tweet->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Tweet deleted successfully',
        ]);
    }

    #[OAT\Get(
        path: '/api/v1/tweets/{id}/toggle_like',
        description: "Toggle like tweet",
        tags: ['Tweet'],
        parameters: [
            new OAT\Parameter(
                name: 'id',
                description: 'Tweet identifier',
                in: 'query',
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
                                property:"status",
                                type:"string",
                                example:"success"
                            ),
                            new OAT\Property(
                                property:"message",
                                type:"string",
                                example:"Tweet successfully liked!"
                            ),
                        ]
                    )
                )
            ),
            new OAT\Response(
                response: 500,
                description: 'Internal Server Error',
                content: new OAT\JsonContent(
                    type: "array",
                    items: new OAT\Items(
                        properties:
                        [
                            new OAT\Property(
                                property:"status",
                                type:"string",
                                example:"error",
                            ),
                            new OAT\Property(
                                property:"message",
                                type:"string",
                                example:"Error message during saving records!",
                            ),
                        ]
                    ),
                ),
            ),
        ]
    )]
    public function toggleLike($id) : JsonResponse|\Exception
    {
        $user = Auth::user();
        $tweet = Tweet::find($id);
        $isLikeExists = $user->likes->contains($id);

        try{
            DB::transaction(function() use($user, $tweet, $id, $isLikeExists) {

                if ($isLikeExists) {
                    $user->likes()->detach($id);
                    $tweet->setLikesCount($tweet->likes_count - 1);
                    $tweet->save();
                } else {
                    $user->likes()->attach($id);
                    $tweet->setLikesCount($tweet->likes_count + 1);
                    $tweet->save();
                }

                DB::commit();
            });
        } catch (\Exception $e) {
            DB::rollback();

            return response()->json([
                'status' => 'error',
                'message' => collect($e->getMessage()),
            ], 500);
        }

        if($isLikeExists) {
            return response()->json([
                'status' => 'success',
                'message' => 'Tweet successfully disliked!',
            ], 200);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'Tweet successfully liked!',
            ], 200);
        }
    }
}
