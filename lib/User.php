<?php

namespace Uiza;

class User extends ApiResource
{
    use \Uiza\ApiOperation\Create;
    use \Uiza\ApiOperation\All;
    use \Uiza\ApiOperation\Retrieve;
    use \Uiza\ApiOperation\Update;
    use \Uiza\ApiOperation\Delete;

    /**
     * @return string The endpoint URL for the given class.
     */
    public static function classUrl()
    {
        return "/admin/user";
    }

    public static function resourceUrl()
    {
        return Base::getBaseUrl() . self::classUrl();
    }

    public static function changePassword($params = [])
    {
        self::_validateParams('ChangePassword', $params);
        $url = static::resourceUrl() . '/changepassword';
        $response = static::_staticRequest('PUT', $url, $params);
        $instance = new static($params['id']);
        $instance->refreshFrom($response->body);
        $instance->setLastResponse($response);

        return $instance;
    }

    public static function logOut($params = [])
    {
        $url = self::resourceUrl() . '/logout';
        $response = static::_staticRequest('POST', $url, $params);

        return $response;
    }
}
