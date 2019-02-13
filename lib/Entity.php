<?php

namespace Uiza;

class Entity extends ApiResource
{
    use \Uiza\ApiOperation\Create;
    use \Uiza\ApiOperation\Update;
    use \Uiza\ApiOperation\Retrieve;
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
        return Base::getBaseUrl() . self::classUrl();
    }

    public static function search($params = [])
    {
        self::_validateParams('Search', $params);
        $url = static::resourceUrl() . '/search';
        $response = static::_staticRequest('GET', $url, $params);
    }

    public static function publish($params = [])
    {
        self::_validateParams('Publish', $params);
        $url = static::resourceUrl() . '/publish';
        $response = static::_staticRequest('POST', $url, $params);
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

    /**
     * @return array A recursive mapping of attributes to values for this object,
     *    including the proper value for deleted attributes.
     */
    public function serializeParameters()
    {
        $updateParams = [];
        $keys = $this->_unsavedValues->toArray();

        foreach ($keys as $key) {
            $updateParams += [$key => $this->_values[$key]];
        }

        $updateParams += ['id' => $this['id']];
        return $updateParams;
    }

    public static function validatePublish($params = [])
    {
        if (!array_key_exists('id', $params)) {
            throw new \Uiza\Exception\InvalidParam('id is required');
        }
    }

    public static function validateSearch($params = [])
    {
        if (!array_key_exists('keyword', $params)) {
            throw new \Uiza\Exception\InvalidParam('keyword is required');
        }
    }

    public static function validateCreate($params = [])
    {
        if (!array_key_exists('name', $params)) {
            throw new \Uiza\Exception\InvalidParam('Name is required');
        }

        if (!array_key_exists('url', $params)) {
            throw new \Uiza\Exception\InvalidParam('Url is required');
        }

        $inputType = ["http", "s3", "ftp", "s3-uiza"];
        if (!array_key_exists('inputType', $params)) {
            throw new \Uiza\Exception\InvalidParam('inputType is required');
        } else {
            if (in_array('inputType', $inputType)) {
                throw new \Uiza\Exception\InvalidParam('inputType is must belong http, s3, ftp, s3-uiza.');
            }
        }
    }
}