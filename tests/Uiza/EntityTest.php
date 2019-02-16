<?php

namespace Tests\Uiza;

use \Tests\TestBase;
use \Uiza\ApiRequestor;
use \Uiza\ApiResponse;
use \Uiza\Entity;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

class EntityTest extends TestBase
{
    public function testCreate()
    {
        $data = [
            'data' => [
                [
                    'id' => '42ceb1ab-18ef-4f2e-b076-14299756d182',
                    'name' => 'Sample Video 1',
                    'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy',
                    'view' => 0,
                    'embedMetadata' => [
                        'artist' => 'John Doe',
                        'album' => 'Album sample',
                        'genre' => 'Pop'
                    ],
                ],
                [
                    'id' => '42ceb1ab-18ef-4f2e-b076-14299756d182',
                    'name' => 'Sample Video 2',
                    'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy',
                    'view' => 0,
                    'embedMetadata' => [
                        'artist' => 'John Doe',
                        'album' => 'Album sample',
                        'genre' => 'Pop'
                    ],
                ],
            ],
            'metadata' => [
                'total' => 2,
                'result' => 2,
                'page' => 1,
                'limit' => 20,
            ],
            'version' => 3,
            'code' => 200,
            'message' => 'OK',
        ];

        // Create a mock subscriber and queue two responses.
        $mock = new MockHandler([
            new Response(200, [], json_encode($data)),         // Use response object
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        ApiRequestor::setHttpClient($client);

        $entitys = Entity::all(['publishToCdn' => 'queue']);
    }
}