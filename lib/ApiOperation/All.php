<?php

namespace Uiza\ApiOperation;

trait All
{
    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return \Stripe\Collection of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl();
        $response = static::_staticRequest('GET', $url, $params);

        return $response;
    }
}