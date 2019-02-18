<?php

namespace Uiza;

use \GuzzleHttp\Client;

class ApiRequestor
{
    /**
     * @var string|null
     */
    private $_apiKey;
    /**
     * @var string
     */
    private $_apiBase;
    /**
     * @var HttpClient\ClientInterface
     */
    private static $_httpClient;

    /**
     * ApiRequestor constructor.
     *
     * @param string|null $apiKey
     * @param string|null $apiBase
     */
    public function __construct($apiKey = null, $apiBase = null)
    {
        $this->_apiKey = $apiKey;
        if (!$apiBase) {
            $apiBase = \Uiza\Base::$apiBase;
        }
        $this->_apiBase = $apiBase;
    }

    public function request($method, $url, $params = null, $headers = null)
    {
        $params = $params ?: [];
        $headers = $headers ?: [];
        list($rbody, $rcode, $rheaders, $json) =
        $this->_requestRaw($method, $url, $params, $headers);
        $resp = new ApiResponse($rbody, $rcode, $rheaders, $json);

        return $resp;
    }

    /**
     * @static
     *
     * @param $client
     */
    public static function setHttpClient($client)
    {
        self::$_httpClient = $client;
    }

    /**
     * @return HttpClient\ClientInterface
     */
    private function httpClient()
    {
        if (!self::$_httpClient) {
            self::$_httpClient = new Client();
        }

        return self::$_httpClient;
    }

    /**
     * @static
     *
     * @param string $apiKey
     * @param null   $clientInfo
     *
     * @return array
     */
    private static function _defaultHeaders($apiKey)
    {
        $defaultHeaders = [
            'Content-Type' => 'application/json',
            'Authorization' => $apiKey,
        ];

        return $defaultHeaders;
    }

    private static function _encodeObjects($params)
    {
        return $params;
    }

    private function correctUrl($url)
    {
        $apiBase = $this->_apiBase;

        if (!$apiBase) {
            $apiBase = \Uiza\Base::$apiBase;
        }

        return rel2abs($url, $apiBase);
    }

    private function _requestRaw($method, $url, $params, $headers)
    {
        $myApiKey = $this->_apiKey;
        if (!$myApiKey) {
            $myApiKey = \Uiza\Base::$apiKey;
        }

        if (!$myApiKey) {
            $msg = 'No API key provided.';
            throw new \Uiza\Exception\Authentication($msg);
        }

        $absUrl = $this->correctUrl($url);

        $params = self::_encodeObjects($params);

        $defaultHeaders = $this->_defaultHeaders($myApiKey);

        $combinedHeaders = array_merge($defaultHeaders, $headers);

        switch ($method) {
            case 'GET':
                $response = $this->httpClient()->get($absUrl, [
                    'query' => $params,
                    'headers' => $combinedHeaders,
                ]);
                break;
            case 'POST':
                $response = $this->httpClient()->post($absUrl, [
                    \GuzzleHttp\RequestOptions::JSON => $params,
                    'headers' => $combinedHeaders,
                ]);
                break;
            case 'PUT':
                $response = $this->httpClient()->put($absUrl, [
                    \GuzzleHttp\RequestOptions::JSON => $params,
                    'headers' => $combinedHeaders,
                ]);
                break;
            case 'DELETE':
                $response = $this->httpClient()->delete($absUrl, [
                    \GuzzleHttp\RequestOptions::JSON => $params,
                    'headers' => $combinedHeaders,
                ]);
                break;
            default:
                # code...
                break;
        }
        $pureContent = $response->getBody()->getContents();
        $jsonContent = json_decode($pureContent);

        $this->handleErrorHttp($response->getStatusCode());
        $this->handleErrorCode($jsonContent);

        return [$jsonContent, $jsonContent->code, $combinedHeaders, $pureContent];
    }

    private function handleErrorHttp($code)
    {
        $errors = [
            400 => 'The request was unacceptable, often due to missing a required parameter',
            401 => 'Unauthorized',
            404 => 'The requested resource doesn\'t exist.',
            422 => 'The syntax of the request is correct (often cause of wrong parameter)',
            500 => 'We had a problem with our server. Try again later.',
            503 => 'The server is overloaded or down for maintenance.',
        ];

        if ($code != 200) {
            throw new \Uiza\Exception\ErrorRequest($code, $errors[$code]);
        }
    }

    private function handleErrorCode($resp)
    {
        if ($resp->code != 200) {
            $errorData = object_only($resp, ['message', 'code']);
            throw new \Uiza\Exception\Base($errorData);
        }
    }
}