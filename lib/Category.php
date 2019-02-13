<?php

namespace Uiza;

class Category extends ApiResource
{
    use \Uiza\ApiOperation\All;
    use \Uiza\ApiOperation\Create;
    use \Uiza\ApiOperation\Retrieve;
    use \Uiza\ApiOperation\Update;
    use \Uiza\ApiOperation\Delete;

    /**
     * @return string The endpoint URL for the given class.
     */
    public static function classUrl()
    {
        return "/media/metadata";
    }

    public static function resourceUrl()
    {
        return self::getBaseUrl() . self::classUrl();
    }

    public static function flattenAttri($values)
    {
        $results = [];
        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $results = array_merge($results, $value);
            } else {
                $results += [$key => $value];
            }
        }

        return $results;
    }

    public static function validateCreate($params = [])
    {
        if (!array_key_exists('name', $params)) {
            throw new \Uiza\Exception\InvalidParam('Name is required');
        }

        $types = ['folder', 'playlist', 'tag'];

        if (!array_key_exists('type', $params)) {
            throw new \Uiza\Exception\InvalidParam('Type is required');
        } else {
            if (!in_array($params['type'], $types)) {
                throw new \Uiza\Exception\InvalidParam('Type is must belong folder, playlist, tag.');
            }
        }
    }
}
