<?php

namespace Uiza\ApiOperation;

trait Retrieve {
	/**
     * @param array|string $id The ID of the API resource to retrieve,
     *     or an options array containing an `id` key.
     * @param array|string|null $opts
     *
     * @return \Stripe\StripeObject
     */
    public static function retrieve($id, $params = null)
    {
    	self::_validateParams($params);
    	$params = ['id' => $id];
        $url = static::resourceUrl();

        $response = static::_staticRequest('GET', $url, $params);
        return $response;
    }
}