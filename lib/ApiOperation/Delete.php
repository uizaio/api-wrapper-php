<?php

namespace Uiza\ApiOperation;

trait Delete {
	/**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return \Uiza\ApiResource The deleted resource.
     */
    public static function delete($id, $params = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl();
        $params = ['id' => $id];
        $response = static::_staticRequest('DELETE', $url, $params);

        return $response;
    }

    public function destroy()
    {
        $params = $this->serializeParameters();
        $url = static::resourceUrl();
        $response = static::_staticRequest('DELETE', $url, $params);
        $this->refreshFrom($response->json);
        $this->setLastResponse($response);

        return $this;
    }
}
