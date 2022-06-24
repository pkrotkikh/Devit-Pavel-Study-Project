<?php

namespace App\Http\Controllers;

use App\Http\Requests\Channels\CreateChannelRequest;
use App\Http\Requests\Channels\SearchChannelRequest;
use App\Http\Requests\Channels\UpdateChannelRequest;
use App\Models\Channel;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OAT;

class ChannelController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Channel::class);
    }

    #[OAT\Get(
        path: '/api/v1/channels',
        description: "List of exists channels",
        tags: ['Channels'],
        parameters: [
            new OAT\Parameter(
                name: 'page',
                description: 'Page number.',
                in: 'query',
                required: false,
                schema: new OAT\Schema(
                    type: "integer",
                    format: "int32",
                    default: 1
                )
            ),
            new OAT\Parameter(
                name: 'per_page',
                description: 'Number, of items per page',
                in: 'query',
                required: false,
                schema: new OAT\Schema(
                    type: "integer",
                    format: "int32",
                    default: 10
                )
            ),
            new OAT\Parameter(
                name: 'from',
                description: 'Range items start date. Available format YYYY-MM-DD',
                in: 'query',
                required: false,
                schema: new OAT\Schema(
                    type: "date",
                    format: "date",
                    pattern: "([0-9]{4})-(?:[0-9]{2})-([0-9]{2})"
                )
            ),
            new OAT\Parameter(
                name: 'to',
                description: 'Range items start date. Available format YYYY-MM-DD',
                in: 'query',
                required: false,
                schema: new OAT\Schema(
                    type: "date",
                    format: "date",
                    pattern: "([0-9]{4})-(?:[0-9]{2})-([0-9]{2})"
                )
            ),
            new OAT\Parameter(
                name: 's',
                description: 'Query keywords',
                in: 'query',
                required: false,
                schema: new OAT\Schema(
                    type: "string",
                )
            ),
            new OAT\Parameter(
                name: 'order',
                description: 'Order direction',
                in: 'query',
                required: false,
                schema: new OAT\Schema(
                    type: "string",
                    enum: ["ASC", "DESC"]
                )
            ),
            new OAT\Parameter(
                name: 'orderBy',
                description: 'Field for order',
                in: 'query',
                required: false,
                schema: new OAT\Schema(
                    type: "string",
                    enum: ["id", "name"]
                )
            ),
            new OAT\Parameter(
                name: 'dma[]',
                description: 'DMA zones system ID',
                in: 'query',
                required: false,
                schema: new OAT\Schema(
                    type: "array",
                    items: new OAT\Items(type: 'integer')
                )
            ),

        ],
        responses: [
            new OAT\Response(
                response: 200,
                description: 'Success',
                content: new OAT\JsonContent(ref: '#components/schemas/ChannelList')
            ),
            new OAT\Response(
                response: 401,
                description: 'Unauthorized',
                content: new OAT\JsonContent(ref: '#/components/schemas/Unauthorized')
            ),
            new OAT\Response(
                response: 403,
                description: 'Forbidden',
                content: new OAT\JsonContent(ref: '#/components/schemas/Forbidden')
            ),
            new OAT\Response(
                response: 422,
                description: 'Validation error',
                content: new OAT\JsonContent(ref: '#/components/schemas/InvalidData')
            )
        ]
    )]
    /**
     * Display a listing of the resource.
     *
     * @param SearchChannelRequest $request
     * @return JsonResponse
     *
     */
    public function index(SearchChannelRequest $request): JsonResponse
    {
        $params = $request->only('s', 'dma', 'order', 'orderBy');
        return response()->json(
            Channel::search($params['s'] ?? '')
                ->with(['logo', 'dmas', 'epgSource'])
                ->whereDmaIn($params['dma'] ?? [])
                ->orderBy($params['orderBy'] ?? 'id', $params['order'] ?? 'ASC')
                ->paginateWithCreationRange()
        );
    }

    #[OAT\Post(
        path: '/api/v1/channels',
        description: "Create channel",
        requestBody: new OAT\RequestBody(
            content: [
                new OAT\MediaType(
                    mediaType: 'application/x-www-form-urlencoded',
                    schema: new OAT\Schema(ref: "#/components/schemas/CreateChannelRequest"),
                    encoding: ['dma[]' => ['explode' => true]]
                )
            ],
        ),
        tags: ['Channels'],
        responses: [
            new OAT\Response(
                response: 200,
                description: 'Success',
                content: new OAT\JsonContent(ref: '#/components/schemas/Channel')
            ),
            new OAT\Response(
                response: 401,
                description: 'Unauthorized',
                content: new OAT\JsonContent(ref: '#/components/schemas/Unauthorized')
            ),
            new OAT\Response(
                response: 403,
                description: 'Forbidden',
                content: new OAT\JsonContent(ref: '#/components/schemas/Forbidden')
            ),
            new OAT\Response(
                response: 422,
                description: 'Validation error',
                content: new OAT\JsonContent(ref: '#/components/schemas/InvalidData')
            )
        ]
    )]
    /**
     * Store a newly created resource in storage.
     * CreateChannel
     * @param CreateChannelRequest $request
     * @return JsonResponse
     */
    public function store(CreateChannelRequest $request): JsonResponse
    {
        $channel = Channel::create(
            $request->only('title', 'description', 'short_description', 'video', 'media_file_id', 'epg_source_id')
        );
        $channel->dmas()->sync($request->get('dma') ?? []);
        return response()->json($channel->load('dmas', 'logo', 'epgSource'));
    }

    #[OAT\Get(
        path: '/api/v1/channels/{channel}',
        description: "Get single channel.",
        tags: ['Channels'],
        parameters: [
            new OAT\Parameter(
                name: 'channel',
                description: 'Single channel unique system id',
                in: 'path',
                required: false,
                schema: new OAT\Schema(
                    type: "integer",
                    format: "int32",
                    default: 1
                )
            )
        ],
        responses: [
            new OAT\Response(
                response: 200,
                description: 'Success',
                content: new OAT\JsonContent(ref: '#/components/schemas/Channel')
            ),
            new OAT\Response(
                response: 401,
                description: 'Unauthorized',
                content: new OAT\JsonContent(ref: '#/components/schemas/Unauthorized')
            ),
            new OAT\Response(
                response: 403,
                description: 'Forbidden',
                content: new OAT\JsonContent(ref: '#/components/schemas/Forbidden')
            ),
            new OAT\Response(
                response: 404,
                description: 'Validation error',
                content: new OAT\JsonContent(ref: '#/components/schemas/NotFound')
            )
        ]
    )]
    /**
     * Display the specified resource.
     *
     * @param Channel $channel
     * @return JsonResponse
     *
     */
    public function show(Channel $channel): JsonResponse
    {
        return response()->json($channel->load(['dmas', 'logo', 'epgSource']));
    }

    #[OAT\Patch(
        path: '/api/v1/channels/{channel}',
        description: "Update channel",
        requestBody: new OAT\RequestBody(
            content: [
                new OAT\MediaType(
                    mediaType: 'application/x-www-form-urlencoded',
                    schema: new OAT\Schema(ref: "#/components/schemas/UpdateChannelRequest")
                )
            ],
        ),
        tags: ['Channels'],
        parameters: [
            new OAT\Parameter(
                name: 'channel',
                description: 'Single channel unique system id',
                in: 'path',
                required: false,
                schema: new OAT\Schema(
                    type: "integer",
                    format: "int32",
                    default: 1
                )
            )
        ],
        responses: [
            new OAT\Response(
                response: 200,
                description: 'Success',
                content: new OAT\JsonContent(ref: '#/components/schemas/Channel')
            ),
            new OAT\Response(
                response: 401,
                description: 'Unauthorized',
                content: new OAT\JsonContent(ref: '#/components/schemas/Unauthorized')
            ),
            new OAT\Response(
                response: 403,
                description: 'Forbidden',
                content: new OAT\JsonContent(ref: '#/components/schemas/Forbidden')
            ),
            new OAT\Response(
                response: 404,
                description: 'Not Found',
                content: new OAT\JsonContent(ref: '#/components/schemas/NotFound')
            ),
            new OAT\Response(
                response: 422,
                description: 'Validation error',
                content: new OAT\JsonContent(ref: '#/components/schemas/InvalidData')
            ),
        ]
    )]
    /**
     * Update the specified resource in storage.
     *
     * @param UpdateChannelRequest $request
     * @param Channel $channel
     * @return JsonResponse
     *
     */
    public function update(UpdateChannelRequest $request, Channel $channel): JsonResponse
    {
        $channel->update(
            $request->only('title', 'description', 'short_description', 'video', 'media_file_id', 'epg_source_id')
        );
        $channel->dmas()->sync($request->get('dma') ?? []);
        return response()->json($channel->load(['dmas', 'logo', 'epgSource']));
    }

    #[OAT\Delete(
        path: '/api/v1/channels/{channel}',
        description: "Remove single channel.",
        tags: ['Channels'],
        parameters: [
            new OAT\Parameter(
                name: 'channel',
                description: 'Single channel unique system id',
                in: 'path',
                required: false,
                schema: new OAT\Schema(
                    type: "integer",
                    format: "int32",
                    default: 1
                )
            )
        ],
        responses: [
            new OAT\Response(
                response: 200,
                description: 'Success',
                content: new OAT\JsonContent(
                    properties: [
                        new OAT\Property(
                            property: "data",
                            type: "boolean",
                            example: true
                        ),
                    ]
                )
            ),
            new OAT\Response(
                response: 401,
                description: 'Unauthorized',
                content: new OAT\JsonContent(ref: '#/components/schemas/Unauthorized')
            ),
            new OAT\Response(
                response: 403,
                description: 'Forbidden',
                content: new OAT\JsonContent(ref: '#/components/schemas/Forbidden')
            ),
            new OAT\Response(
                response: 404,
                description: 'Validation error',
                content: new OAT\JsonContent(ref: '#/components/schemas/NotFound')
            )
        ]
    )]
    /**
     * Remove the specified resource from storage.
     *
     * @param Channel $channel
     * @return JsonResponse
     *
     */
    public function destroy(Channel $channel): JsonResponse
    {
        return response()->json([
            'data' => $channel->delete()
        ]);
    }
}
