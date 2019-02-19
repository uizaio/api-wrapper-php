<?php

namespace Tests\Uiza;

use \Tests\TestBase;
use \Uiza\ApiRequestor;
use \Uiza\ApiResponse;
use \Uiza\Storage;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;


class StorageTest extends TestBase
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

    public function testAdd()
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
            "name" => "FTP Uiza",
            "description" => "FTP of Uiza, use for transcode",
            "storageType" => "ftp",
            "host" => "ftp-example.uiza.io",
            "username" => "uiza",
            "password" => "=59x@LPsd+w7qW",
            "port" => 21
        ];

        $storage = Storage::create($params);

        $this->assertInstanceOf(Storage::class, $storage);

        $this->assertEquals($storage->id, $return['data']['id']);
    }

    public function testRetrieve()
    {
        $return = [
            'data' => [
                'id' => '42ceb1ab-18ef-4f2e-b076-14299756d182',
                "name" => "FTP Uiza",
                "description" => "FTP of Uiza, use for transcode",
                "storageType" => "ftp",
                "usageType" => "input",
                "bucket" => null,
                "prefix" => null,
                "host" => "ftp-exemple.uiza.io",
                "awsAccessKey" => null,
                "awsSecretKey" => null,
                "username" => "uiza",
                "password" => "=5;9x@LPsd+w7qW",
                "region" => null,
                "port" => 21,
                "createdAt" => "2018-06-19T03:01:56.000Z",
                "updatedAt" => "2018-06-19T03:01:56.000Z"
            ],
            'version' => 3,
            'code' => 200,
            'message' => 'OK',
        ];

        $this->mockData($return);

        $storage = Storage::retrieve('42ceb1ab-18ef-4f2e-b076-14299756d182');

        $this->assertInstanceOf(Storage::class, $storage);

        $this->assertEquals($storage->id, $return['data']['id']);
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

        $params = [
            "name" => "FTP Uiza",
            "description" => "FTP of Uiza, use for transcode",
            "storageType" => "ftp",
            "host" => "ftp-example.uiza.io",
            "username" => "uiza",
            "password" => "=5;'9x@LPsd+w7qW",
            "port" => 21
        ];

        $storage = Storage::update('42ceb1ab-18ef-4f2e-b076-14299756d182', $params);

        $this->assertInstanceOf(Storage::class, $storage);

        $this->assertEquals($storage->id, $return['data']['id']);
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

        $storage = Storage::delete('42ceb1ab-18ef-4f2e-b076-14299756d182');

        $this->assertEquals($storage->id, $return['data']['id']);
    }
}
