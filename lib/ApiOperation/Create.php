<?php

namespace Uiza\ApiOperation;

trait Create {
    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return \Stripe\ApiResource The created resource.
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();
        $response = static::_staticRequest('post', $url, $params, $options);
        return $response;
    }
}