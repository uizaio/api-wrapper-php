<?php

namespace Uiza;

class LiveStreaming extends ApiResource
{
    use \Uiza\ApiOperation\Create;

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
}
