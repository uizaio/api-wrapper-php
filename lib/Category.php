<?php

namespace Uiza;

class Category extends Base
{
    use \Uiza\ApiOperation\Request;
    use \Uiza\ApiOperation\Create;
    use \Uiza\ApiOperation\All;

    /**
     * @return string The endpoint URL for the given class.
     */
    public static function classUrl()
    {
        return "/media/entity";
    }

    public static function resourceUrl()
    {
        return self::getBaseUrl() . self::classUrl();
    }
}