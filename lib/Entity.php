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
}