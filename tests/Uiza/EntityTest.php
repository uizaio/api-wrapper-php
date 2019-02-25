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
    protected function setUp()
    {
        parent::setUp();
    }

    private function mockData($data)
    {
        // Create a mock subscriber and queue two responses.
        $mock = new MockHandler([
            new Response(200, [], json_encode($data)),         // Use response object
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        ApiRequestor::setHttpClient($client);
    }

    public function testList()
    {
        $return = [
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

        $this->mockData($return);

        $entitys = Entity::all(['publishToCdn' => 'queue']);

        $this->assertInternalType('array', $entitys->body->data);
    }

    public function testCreate()
    {
        $return = [
            'data' => [
                'id' => '42ceb1ab-18ef-4f2e-b076-14299756d182',
            ],
            'version' => 3,
            'code' => 200,
            'message' => 'OK',
        ];

        $this->mockData($return);

        $params = [
            'name' => 'ngoc2',
            'url' => 'https://stackoverflow.com/questions/41836785/why-i-cant-convert-this-object-representing-a-web-service-response-into-strin',
            'inputType' => 'http',
        ];

        $entity = Entity::create($params);

        $this->assertInstanceOf(Entity::class, $entity);

        $this->assertEquals($entity->id, $return['data']['id']);
    }

    public function testRetrieve()
    {
        $return = [
            'data' => [
                'id' => '42ceb1ab-18ef-4f2e-b076-14299756d182',
                'name' => 'Name',
                'description' => 'Change desc',
                'embedMetadata' => [
                    'artist' =>  'John Doe',
                    'album' =>  'Album sample',
                    'genre' => 'Pop'
                ]
            ],
            'version' => 3,
            'code' => 200,
            'message' => 'OK',
        ];

        $this->mockData($return);

        $id = '42ceb1ab-18ef-4f2e-b076-14299756d182';
        $entity = Entity::retrieve($id);

        $this->assertInstanceOf(Entity::class, $entity);

        $this->assertEquals($entity->id, $id);
    }

    public function testUpdate()
    {
        $return = [
            'data' => [
                'id' => '42ceb1ab-18ef-4f2e-b076-14299756d182',
            ],
            'version' => 3,
            'code' => 200,
            'message' => 'OK',
        ];

        $this->mockData($return);

        $id = '42ceb1ab-18ef-4f2e-b076-14299756d182';
        $params = [
            'name' => 'Name edited',
            'description' => 'Change desc',
        ];

        $entity = Entity::update($id, $params);

        $this->assertInstanceOf(Entity::class, $entity);

        $this->assertEquals($entity->id, $return['data']['id']);
    }

    public function testDelete()
    {
        $return = [
            'data' => [
                'id' => '42ceb1ab-18ef-4f2e-b076-14299756d182',
            ],
            'version' => 3,
            'code' => 200,
            'message' => 'OK',
        ];

        $this->mockData($return);

        $id = '42ceb1ab-18ef-4f2e-b076-14299756d182';
        $entity = Entity::delete($id);

        $this->assertEquals($entity->id, $return['data']['id']);
    }

    public function testSearch()
    {
        $return = [
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

        $this->mockData($return);

        $entitys = Entity::search(['keyword' => 'sample']);

        $this->assertInternalType('array', $entitys->body->data);
    }

    public function testPublish()
    {
        $return = [
            'data' => [
                'id' => '42ceb1ab-18ef-4f2e-b076-14299756d182',
                "message" => "Your entity started publish, check process status with this entity ID",
                "entityId" => "42ceb1ab-18ef-4f2e-b076-14299756d182"
            ],
            'version' => 3,
            'code' => 200,
            'message' => 'OK',
        ];

        $this->mockData($return);

        $entity = Entity::publish(['id' => '42ceb1ab-18ef-4f2e-b076-14299756d182']);

        $this->assertEquals($entity->id, $return['data']['id']);
    }

    public function testGetStatusPublish()
    {
        $return = [
            'data' => [
                "progress" => 0,
                "status" => "processing"
            ],
            'version' => 3,
            'code' => 200,
            'message' => 'OK',
        ];

        $this->mockData($return);

        $id = '42ceb1ab-18ef-4f2e-b076-14299756d182';
        $entity = Entity::getStatusPublish($id);

        $this->assertEquals($entity->progress, $return['data']['progress']);
    }

    public function testGetAWSUploadKey()
    {
        $return = [
            'data' => [
                "temp_expire_at" => 1533658598,
                "temp_access_id" => "access id",
                "bucket_name" => "bucket name",
            ],
            'version' => 3,
            'code' => 200,
            'message' => 'OK',
        ];

        $this->mockData($return);

        $entity = Entity::getAWSUploadKey();

        $this->assertEquals($entity->body->data->temp_access_id, $return['data']['temp_access_id']);
    }
}
