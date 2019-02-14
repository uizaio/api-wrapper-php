<?php

namespace Uiza\ApiOperation;

trait Update
{
    /**
     * @param string $id The ID of the resource to update.
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return \Uiza\ApiResource The updated resource.
     */
    public static function update($id, $params = null)
    {
        self::_validateParams('Update', $params);
        $params += ['id' => $id];
        $url = static::classUrl();
        $response = static::_staticRequest('PUT', $url, $params);
        $instance = new static($id);
        $instance->refreshFrom($response->json);
        $instance->setLastResponse($response);

        return $instance;
    }

    /**
     * @param array|string|null $opts
     *
     * @return \Uiza\ApiResource The saved resource.
     */
    public function save()
    {
        $params = $this->serializeParameters();
        $url = static::classUrl();
        $response = static::_staticRequest('PUT', $url, $params);
        $this->refreshFrom($response->json);

        return $this;
    }
}
