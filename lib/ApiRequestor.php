<?php

namespace Uiza;
use \Curl\Curl;

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
            self::$_httpClient = new Curl();
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

        foreach ($combinedHeaders as $header => $value) {
            $this->httpClient()->setHeader($header, $value);
        }
        switch ($method) {
            case 'GET':
                $this->httpClient()->get($absUrl, $params);
                break;
            case 'POST':
                $this->httpClient()->post($absUrl, $params);
                break;
            case 'PUT':
                $this->httpClient()->put($absUrl, $params);
                break;
            case 'DELETE':
                $this->httpClient()->delete($absUrl, $params);
                break;
            default:
                # code...
                break;
        }
        $curl = $this->httpClient();
        if ($curl->error) {
            throw new \Uiza\Exception\InvalidRequest('Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n");
        } else {
            $this->handleErrorHttp($curl->response);
            return $this->_interpretResponse($curl->response, $curl->responseHeaders);
        }
    }

    private function handleErrorHttp($res)
    {
        if (is_null($res) || !$res->message || !$res->code) {
            $msg = "Invalid structure response body from API";

            throw new \Uiza\Exception\Base($msg);
        }

        return $res;
    }

    private function handleErrorResponse($resp)
    {
        $errorData = object_only($resp, ['message', 'code']);

        throw new \Uiza\Exception\Base($errorData);
    }

    private function _interpretResponse($res, $rheaders)
    {
        $resp = $this->handleErrorHttp($res);

        if ($resp->code != 200) {
             $this->handleErrorResponse($resp);
        }

        return [$resp, $resp->code, $rheaders, $res];
    }
}