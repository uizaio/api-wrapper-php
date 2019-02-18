<?php

namespace Uiza;

class Storage extends ApiResource
{
    use \Uiza\ApiOperation\Create;
    use \Uiza\ApiOperation\Retrieve;
    use \Uiza\ApiOperation\Update;
    use \Uiza\ApiOperation\Delete;

    /**
     * @return string The endpoint URL for the given class.
     */
    public static function classUrl()
    {
        return "/media/storage";
    }

    public static function resourceUrl()
    {
        return Base::getBaseUrl() . self::classUrl();
    }
}
