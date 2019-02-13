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
        self::_validateParams('Create', $params);
        $url = static::classUrl();
        $response = static::_staticRequest('POST', $url, $params, $options);

        $instance = new static;
        $instance->refreshFrom($response->json);
        $instance->setLastResponse($response);

        return $instance;
    }
}