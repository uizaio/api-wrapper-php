<?php

namespace Uiza;

class Callback extends Base
{
    use \Uiza\ApiOperation\Request;
    use \Uiza\ApiOperation\Create;
    use \Uiza\ApiOperation\All;

    /**
     * @return string The endpoint URL for the given class.
     */
    public static function classUrl()
    {
        return "/media/entity/callback";
    }

    public static function resourceUrl()
    {
        return self::getBaseUrl() . self::classUrl();
    }
}