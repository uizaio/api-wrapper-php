<?php

namespace Uiza;

class User extends ApiResource
{
    use \Uiza\ApiOperation\Create;
    use \Uiza\ApiOperation\All;
    use \Uiza\ApiOperation\Retrieve;

    /**
     * @return string The endpoint URL for the given class.
     */
    public static function classUrl()
    {
        return "/admin/user";
    }

    public static function resourceUrl()
    {
        return Base::getBaseUrl() . self::classUrl();
    }
}
