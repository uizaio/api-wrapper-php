<?php

namespace Uiza;

class Live extends ApiResource
{
    use \Uiza\ApiOperation\Create;
    use \Uiza\ApiOperation\Retrieve;
    use \Uiza\ApiOperation\Update;

    /**
     * @return string The endpoint URL for the given class.
     */
    public static function classUrl()
    {
        return "/live/entity";
    }

    public static function resourceUrl()
    {
        return Base::getBaseUrl() . self::classUrl();
    }

    public static function startFeed($params = [])
    {
        self::_validateParams('StartFeed', $params);
        $url = static::resourceUrl() . '/feed';
        $response = static::_staticRequest('POST', $url, $params);

        $instance = new static($params['id']);
        $instance->refreshFrom($response->body);
        $instance->setLastResponse($response);

        return $instance;
    }

    public static function stopFeed($params = [])
    {
        self::_validateParams('StopFeed', $params);
        $url = static::resourceUrl() . '/feed';
        $response = static::_staticRequest('PUT', $url, $params);

        $instance = new static($params['id']);
        $instance->refreshFrom($response->body);
        $instance->setLastResponse($response);

        return $instance;
    }

    public static function getView($params = [])
    {
        self::_validateParams('GetView', $params);
        $url = static::resourceUrl() . '/tracking/current-view';
        $response = static::_staticRequest('GET', $url, $params);

        $instance = new static($params['id']);
        $instance->refreshFrom($response->body);
        $instance->setLastResponse($response);

        return $instance;
    }

    public static function listRecorded($params = null, $convertObj = false)
    {
        self::_validateParams('ListRecored', $params);
        $url = static::resourceUrl() . '/dvr';
        $response = static::_staticRequest('GET', $url, $params);

        if ($convertObj) {
            $newResponse = new Collection();
            foreach ($response->body->data as $key => $value) {
                $instance = new static;
                $instance->refreshFrom($value);
                $instance->setLastResponse($response);
                $newResponse->add($value);
            }

            return $newResponse;
        }

        return $response;
    }

    public static function delete($id, $params = null)
    {
        self::_validateParams('Delete', $params);
        $url = static::resourceUrl() . '/dvr';
        $params = ['id' => $id];
        $response = static::_staticRequest('DELETE', $url, $params);
        $instance = new static($id);
        $instance->refreshFrom($response->body);
        $instance->setLastResponse($response);

        return $instance;
    }

    public static function convertToVOD($params = [])
    {
        self::_validateParams('ConvertToVOD', $params);
        $url = static::resourceUrl() . '/dvr/convert-to-vod';
        $response = static::_staticRequest('POST', $url, $params);

        $instance = new static($params['id']);
        $instance->refreshFrom($response->body);
        $instance->setLastResponse($response);

        return $instance;
    }
}
