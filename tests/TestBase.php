<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class TestBase extends TestCase
{
    protected $apiBase;

    protected $apiKey;

    protected $apiVersion;

    /** @var object HTTP client mocker */
    protected $apiRequestor;

    protected function setUp()
    {
        // Save original values so that we can restore them after running tests
        $this->apiBase = \Uiza\Base::$apiBase;

        $this->apiKey = \Uiza\Base::$apiKey;

        $this->apiVersion = \Uiza\Base::$apiVersion;

        \Uiza\Base::setApiKey('api key test');
        \Uiza\Base::setApiSubdomain('apiwrapper');
    }
}