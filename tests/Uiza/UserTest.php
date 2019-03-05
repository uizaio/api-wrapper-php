<?php

namespace Tests\Uiza;

use \Tests\TestBase;
use \Uiza\User;

class UserTest extends TestBase
{
    protected function setUp()
    {
        parent::setUp();
    }

    public function testCreate()
    {
        $return = [
            'data' => [
                'id' => '37d6706e-be91-463e-b3b3-b69451dd4752',
            ],
            'version' => 3,
            'code' => 200,
            'message' => 'OK',
        ];

        $this->mockData($return);

        $params = [
            "status"  => 1,
            "username" => "test",
            "email" => "abc_test@uiza.io",
            "fullname" => "Test",
            "avatar" => "https://exemple.com/avatar.jpeg",
            "dob" => "05/15/2018",
            "gender" => 0,
            "password" => "FMpsr<4[dGPu?B#u",
            "isAdmin" => 1
        ];

        $user = User::create($params);

        $this->assertInstanceOf(User::class, $user);

        $this->assertEquals($user->id, $return['data']['id']);
    }

    public function testCreateError()
    {
        $statusCode = $this->statusCode();

        foreach ($statusCode as $key => $value) {
            $this->mockDataError($key);

            try {
                $params = [
                    "status"  => 1,
                    "username" => "test",
                    "email" => "abc_test@uiza.io",
                    "fullname" => "Test",
                    "avatar" => "https://exemple.com/avatar.jpeg",
                    "dob" => "05/15/2018",
                    "gender" => 0,
                    "password" => "FMpsr<4[dGPu?B#u",
                    "isAdmin" => 1
                ];

                $user = User::create($params);

            } catch (\Uiza\Exception\BadRequestError $e) {
                $this->assertEquals($e->statusCode, 400);
            } catch (\Uiza\Exception\UnauthorizedError $e) {
                $this->assertEquals($e->statusCode, 401);
            } catch (\Uiza\Exception\NotFoundError $e) {
                $this->assertEquals($e->statusCode, 404);
            } catch (\Uiza\Exception\UnprocessableError $e) {
                $this->assertEquals($e->statusCode, 422);
            } catch (\Uiza\Exception\InternalServerError $e) {
                $this->assertEquals($e->statusCode, 500);
            } catch (\Uiza\Exception\ServiceUnavailableError $e) {
                $this->assertEquals($e->statusCode, 503);
            } catch (\Uiza\Exception\ClientError $e) {
                $this->assertEquals($e->statusCode, $key);
            } catch (\Uiza\Exception\ServerError $e) {
                $this->assertEquals($e->statusCode, $key);
            }
        }
    }

    public function testRetrieve()
    {
        $return = [
            'data' => [
                'id' => '42ceb1ab-18ef-4f2e-b076-14299756d182',
                "isAdmin" => 0,
                "username" => "test pass",
                "email" => "a_test@uiza.io",
                "avatar" => "https://exemple.com/avatar.jpeg",
                "fullName" => "Test",
                "updatedAt" => "2019-03-04T03:20:04.000Z",
                "createdAt" => "2019-03-04T03:20:04.000Z",
                "status" => 1
            ],
            'version' => 3,
            'code' => 200,
            'message' => 'OK',
        ];

        $this->mockData($return);

        $id = '42ceb1ab-18ef-4f2e-b076-14299756d182';
        $user = User::retrieve($id);

        $this->assertInstanceOf(User::class, $user);

        $this->assertEquals($user->id, $id);
    }

    public function testRetrieveError()
    {
        $statusCode = $this->statusCode();

        foreach ($statusCode as $key => $value) {
            $this->mockDataError($key);

            try {
                $id = '42ceb1ab-18ef-4f2e-b076-14299756d182';
                $user = User::retrieve($id);

            } catch (\Uiza\Exception\BadRequestError $e) {
                $this->assertEquals($e->statusCode, 400);
            } catch (\Uiza\Exception\UnauthorizedError $e) {
                $this->assertEquals($e->statusCode, 401);
            } catch (\Uiza\Exception\NotFoundError $e) {
                $this->assertEquals($e->statusCode, 404);
            } catch (\Uiza\Exception\UnprocessableError $e) {
                $this->assertEquals($e->statusCode, 422);
            } catch (\Uiza\Exception\InternalServerError $e) {
                $this->assertEquals($e->statusCode, 500);
            } catch (\Uiza\Exception\ServiceUnavailableError $e) {
                $this->assertEquals($e->statusCode, 503);
            } catch (\Uiza\Exception\ClientError $e) {
                $this->assertEquals($e->statusCode, $key);
            } catch (\Uiza\Exception\ServerError $e) {
                $this->assertEquals($e->statusCode, $key);
            }
        }
    }

    public function testList()
    {
        $return = [
            'data' => [
                [
                    "id" => "3c7d0741-459f-4c06-9841-9a8eb199c02f",
                    "isAdmin" => 0,
                    "username" => "test pass",
                    "email" => "a_test@uiza.io",
                    "avatar" => "https://exemple.com/avatar.jpeg",
                    "fullName" => "Test",
                    "updatedAt" => "2019-03-04T03:20:04.000Z",
                    "createdAt" => "2019-03-04T03:20:04.000Z",
                    "status" => 1
                ],
                [
                    "id" => "3c7d0741-459f-4c06-9841-9a8eb199c02f",
                    "isAdmin" => 0,
                    "username" => "test22 pass",
                    "email" => "a_test2@uiza.io",
                    "avatar" => "https://exemple.com/avatar.jpeg",
                    "fullName" => "Test",
                    "updatedAt" => "2019-03-04T03:20:04.000Z",
                    "createdAt" => "2019-03-04T03:20:04.000Z",
                    "status" => 1
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

        $users = User::list();

        $this->assertInternalType('array', $users->body->data);
    }

    public function testListError()
    {
        $statusCode = $this->statusCode();

        foreach ($statusCode as $key => $value) {
            $this->mockDataError($key);

            try {
                $users = User::list();

            } catch (\Uiza\Exception\BadRequestError $e) {
                $this->assertEquals($e->statusCode, 400);
            } catch (\Uiza\Exception\UnauthorizedError $e) {
                $this->assertEquals($e->statusCode, 401);
            } catch (\Uiza\Exception\NotFoundError $e) {
                $this->assertEquals($e->statusCode, 404);
            } catch (\Uiza\Exception\UnprocessableError $e) {
                $this->assertEquals($e->statusCode, 422);
            } catch (\Uiza\Exception\InternalServerError $e) {
                $this->assertEquals($e->statusCode, 500);
            } catch (\Uiza\Exception\ServiceUnavailableError $e) {
                $this->assertEquals($e->statusCode, 503);
            } catch (\Uiza\Exception\ClientError $e) {
                $this->assertEquals($e->statusCode, $key);
            } catch (\Uiza\Exception\ServerError $e) {
                $this->assertEquals($e->statusCode, $key);
            }
        }
    }

    public function testUpdate()
    {
        $return = [
            'data' => [
                'id' => '37d6706e-be91-463e-b3b3-b69451dd4752',
            ],
            'version' => 3,
            'code' => 200,
            'message' => 'OK',
        ];

        $this->mockData($return);

        $params = [
            "status"  => 1,
            "username" => "test",
            "email" => "abc_test@uiza.io",
            "fullname" => "Test",
            "avatar" => "https://exemple.com/avatar.jpeg",
            "dob" => "05/15/2018",
            "gender" => 0,
            "password" => "FMpsr<4[dGPu?B#u",
            "isAdmin" => 1
        ];

        $id = '37d6706e-be91-463e-b3b3-b69451dd4752';
        $user = User::update($id, $params);

        $this->assertInstanceOf(User::class, $user);

        $this->assertEquals($user->id, $return['data']['id']);
    }

    public function testUpdateError()
    {
        $statusCode = $this->statusCode();

        foreach ($statusCode as $key => $value) {
            $this->mockDataError($key);

            try {
                $params = [
                    "status"  => 1,
                    "username" => "test",
                    "email" => "abc_test@uiza.io",
                    "fullname" => "Test",
                    "avatar" => "https://exemple.com/avatar.jpeg",
                    "dob" => "05/15/2018",
                    "gender" => 0,
                    "password" => "FMpsr<4[dGPu?B#u",
                    "isAdmin" => 1
                ];

                $id = '37d6706e-be91-463e-b3b3-b69451dd4752';
                $user = User::update($id, $params);

            } catch (\Uiza\Exception\BadRequestError $e) {
                $this->assertEquals($e->statusCode, 400);
            } catch (\Uiza\Exception\UnauthorizedError $e) {
                $this->assertEquals($e->statusCode, 401);
            } catch (\Uiza\Exception\NotFoundError $e) {
                $this->assertEquals($e->statusCode, 404);
            } catch (\Uiza\Exception\UnprocessableError $e) {
                $this->assertEquals($e->statusCode, 422);
            } catch (\Uiza\Exception\InternalServerError $e) {
                $this->assertEquals($e->statusCode, 500);
            } catch (\Uiza\Exception\ServiceUnavailableError $e) {
                $this->assertEquals($e->statusCode, 503);
            } catch (\Uiza\Exception\ClientError $e) {
                $this->assertEquals($e->statusCode, $key);
            } catch (\Uiza\Exception\ServerError $e) {
                $this->assertEquals($e->statusCode, $key);
            }
        }
    }

    public function testDelete()
    {
        $return = [
            'data' => [
                'id' => '37d6706e-be91-463e-b3b3-b69451dd4752',
            ],
            'version' => 3,
            'code' => 200,
            'message' => 'OK',
        ];

        $this->mockData($return);

        $id = '37d6706e-be91-463e-b3b3-b69451dd4752';
        $user = User::delete($id);

        $this->assertEquals($user->id, $return['data']['id']);
    }

    public function testDeleteError()
    {
        $statusCode = $this->statusCode();

        foreach ($statusCode as $key => $value) {
            $this->mockDataError($key);

            try {
                $id = '37d6706e-be91-463e-b3b3-b69451dd4752';
                $user = User::delete($id);

            } catch (\Uiza\Exception\BadRequestError $e) {
                $this->assertEquals($e->statusCode, 400);
            } catch (\Uiza\Exception\UnauthorizedError $e) {
                $this->assertEquals($e->statusCode, 401);
            } catch (\Uiza\Exception\NotFoundError $e) {
                $this->assertEquals($e->statusCode, 404);
            } catch (\Uiza\Exception\UnprocessableError $e) {
                $this->assertEquals($e->statusCode, 422);
            } catch (\Uiza\Exception\InternalServerError $e) {
                $this->assertEquals($e->statusCode, 500);
            } catch (\Uiza\Exception\ServiceUnavailableError $e) {
                $this->assertEquals($e->statusCode, 503);
            } catch (\Uiza\Exception\ClientError $e) {
                $this->assertEquals($e->statusCode, $key);
            } catch (\Uiza\Exception\ServerError $e) {
                $this->assertEquals($e->statusCode, $key);
            }
        }
    }

    public function testChangePassword()
    {
        $return = [
            'data' => [
                'result' => 'ok',
            ],
            'version' => 3,
            'code' => 200,
            'message' => 'OK',
        ];

        $this->mockData($return);

        $params = [
            "id" => "2c98b4d5-7d7f-4a0f-9258-5689f90fd28c",
            "oldPassword" => "FMpsr<4[dGPu?B#u",
            "newPassword" => "S57Eb{:aMZhW=)G$"
        ];

        $user = User::changePassword($params);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($user->result, $return['data']['result']);
    }

    public function testChangePasswordError()
    {
        $statusCode = $this->statusCode();

        foreach ($statusCode as $key => $value) {
            $this->mockDataError($key);

            try {
                $params = [
                    "id" => "2c98b4d5-7d7f-4a0f-9258-5689f90fd28c",
                    "oldPassword" => "FMpsr<4[dGPu?B#u",
                    "newPassword" => "S57Eb{:aMZhW=)G$"
                ];

                $user = User::changePassword($params);

            } catch (\Uiza\Exception\BadRequestError $e) {
                $this->assertEquals($e->statusCode, 400);
            } catch (\Uiza\Exception\UnauthorizedError $e) {
                $this->assertEquals($e->statusCode, 401);
            } catch (\Uiza\Exception\NotFoundError $e) {
                $this->assertEquals($e->statusCode, 404);
            } catch (\Uiza\Exception\UnprocessableError $e) {
                $this->assertEquals($e->statusCode, 422);
            } catch (\Uiza\Exception\InternalServerError $e) {
                $this->assertEquals($e->statusCode, 500);
            } catch (\Uiza\Exception\ServiceUnavailableError $e) {
                $this->assertEquals($e->statusCode, 503);
            } catch (\Uiza\Exception\ClientError $e) {
                $this->assertEquals($e->statusCode, $key);
            } catch (\Uiza\Exception\ServerError $e) {
                $this->assertEquals($e->statusCode, $key);
            }
        }
    }

    public function testLogOut()
    {
        $return = [
            "message" => "Logout success",
            "code" => 200,
        ];

        $this->mockData($return);

        $user = User::logOut();

        $this->assertEquals($user->body->code, $return['code']);
    }

    public function testLogOutError()
    {
        $statusCode = $this->statusCode();

        foreach ($statusCode as $key => $value) {
            $this->mockDataError($key);

            try {
                $user = User::logOut();

            } catch (\Uiza\Exception\BadRequestError $e) {
                $this->assertEquals($e->statusCode, 400);
            } catch (\Uiza\Exception\UnauthorizedError $e) {
                $this->assertEquals($e->statusCode, 401);
            } catch (\Uiza\Exception\NotFoundError $e) {
                $this->assertEquals($e->statusCode, 404);
            } catch (\Uiza\Exception\UnprocessableError $e) {
                $this->assertEquals($e->statusCode, 422);
            } catch (\Uiza\Exception\InternalServerError $e) {
                $this->assertEquals($e->statusCode, 500);
            } catch (\Uiza\Exception\ServiceUnavailableError $e) {
                $this->assertEquals($e->statusCode, 503);
            } catch (\Uiza\Exception\ClientError $e) {
                $this->assertEquals($e->statusCode, $key);
            } catch (\Uiza\Exception\ServerError $e) {
                $this->assertEquals($e->statusCode, $key);
            }
        }
    }
}
