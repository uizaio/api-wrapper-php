<?php

namespace Uiza\ApiOperation;

trait Delete {
	/**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return \Stripe\ApiResource The deleted resource.
     */
    public function delete($params = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();
        $response = static::_staticRequest('DELETE', $url, $params);
        $instance = new static($id);
        $instance->refreshFrom($response->json);
        $instance->setLastResponse($response);

        return $this;
    }
}