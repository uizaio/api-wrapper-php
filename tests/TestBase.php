<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class TestBase extends TestCase
{
    protected function setUp()
    {
        \Uiza\Base::setApiKey('api key test');
        \Uiza\Base::setWorkspaceApiDomain('apiwrapper');

        // Save original values so that we can restore them after running tests
        $this->apiBase = \Uiza\Base::$apiBase;

        $this->apiKey = \Uiza\Base::$apiKey;

        $this->apiVersion = \Uiza\Base::$apiVersion;
    }
}
