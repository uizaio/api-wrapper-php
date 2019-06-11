<?php

require __DIR__ . "/../vendor/autoload.php";

Uiza\Base::setAuthorization('your-authorization-key');

try {
    $response = Uiza\Live::getRegions();

    print_r($response->SINGAPORE);

    $params = [
        "name" => "test event",
        "mode" => "push",
        "encode" => 1,
        "dvr" => 1,
        "description" => "This is for test event",
        "poster" => "//image1.jpeg",
        "thumbnail" => "//image1.jpeg",
        "linkStream" => [
            "https://playlist.m3u8"
        ],
        "resourceMode" => "single",
        "region" => $response->VIETNAM
    ];

    try {
        $live = Uiza\Live::create($params);

        print_r($live);
    } catch(\Uiza\Exception\ErrorResponse $e) {
        print($e);
    }
} catch (\Uiza\Exception\ErrorResponse $e) {
    print($e);
}

