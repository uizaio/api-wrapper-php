<?php
namespace Uiza;

class UizaObject implements \ArrayAccess, \Countable, \JsonSerializable {

    protected $_values;

    protected $_lastResponse;

    protected $_originalValues;

    protected $_unsavedValues;

    public function __construct($id = null, $opts = null)
    {
        $this->_values = [];
        $this->_originalValues = [];

        $this->_unsavedValues = new Util\Set();

        if ($id !== null) {
            $this->_values['id'] = $id;
        }
    }

    public function offsetSet($k, $v)
    {
        $this->$k = $v;
    }

    public function offsetGet($k)
    {
        return array_key_exists($k, $this->_values) ? $this->_values[$k] : null;
    }

    // Countable method
    public function count()
    {
        return count($this->_values);
    }

    public function offsetExists($k)
    {
        return array_key_exists($k, $this->_values);
    }

    public function offsetUnset($k)
    {
        unset($this->$k);
    }

    public function jsonSerialize()
    {
        return $this->__toArray(true);
    }

    /**
     * Sets all keys within the object as unsaved so that they will be
     * included with an update when `serializeParameters` is called. This
     * method is also recursive, so any object contained as values or
     * which are values in a tenant array are also marked as dirty.
     */
    public function dirty($k)
    {
        if ($this->_unsavedValues != null) {
            $this->_unsavedValues->add($k);
        } else {
            $this->_unsavedValues = new \Uiza\Util\Set([$k]);
        }
    }

    public function __set($k, $v) {
        $this->_values[$k] = $v;
        $this->dirty($k);
    }

    public function __get($k) {
        if (!empty($this->_values) && array_key_exists($k, $this->_values)) {
            return $this->_values[$k];
        }

        return null;
    }

    /**
     * Recursively converts the PHP Stripe object to an array.
     *
     * @param array $values The PHP Stripe object to convert.
     * @return array
     */
    public static function convertUizaObjectToArray($values)
    {
        $results = [];
        foreach ($values as $k => $v) {
            if ($v instanceof StripeObject) {
                $results[$k] = $v->__toArray(true);
            } elseif (is_array($v)) {
                $results[$k] = self::convertUizaObjectToArray($v);
            } else {
                $results[$k] = $v;
            }
        }
        return $results;
    }

    public function __toArray($recursive = false)
    {
        if ($recursive) {
            return self::convertUizaObjectToArray($this->_values);
        } else {
            return $this->_values;
        }
    }

    /**
     *
     *
     * @param array $values
     * @param null|string|array|Util\RequestOptions $opts
     *
     * @return StripeObject The object constructed from the given values.
     */
    public static function constructFrom($values)
    {
        $obj = new static(isset($values['id']) ? $values['id'] : null);
        $obj->refreshFrom($values);
        return $obj;
    }

    /**
     * @param ApiResponse
     *
     * @return void Set the last response from the Stripe API
     */
    public function setLastResponse($resp)
    {
        $this->_lastResponse = $resp;
    }

    /**
     * Refreshes this object using the provided values.
     *
     * @param array $values
     * @param null|string|array|Util\RequestOptions $opts
     * @param boolean $partial Defaults to false.
     */
    public function refreshFrom($values)
    {
        $this->_originalValues = self::deepCopy($values);

        if ($values instanceof UizaObject) {
            $values = $values->__toArray(true);
        }

        if ($values instanceof stdClass || is_object($values)) {
            $values = json_decode(json_encode($values), true);
        }

        $values = static::flattenAttri($values);

        // Wipe old state before setting new.  This is useful for e.g. updating a
        // customer, where there is no persistent card parameter.  Mark those values
        // which don't persist as transient

        $removed = new \Uiza\Util\Set(array_diff(array_keys($this->_values), array_keys($values)));

        foreach ($removed->toArray() as $k) {
            unset($this->$k);
        }

        $this->updateAttributes($values);

        foreach ($values as $k => $v) {
            $this->_unsavedValues->discard($k);
        }
    }

    /**
     * Produces a deep copy of the given object including support for arrays
     * and StripeObjects.
     */
    protected static function deepCopy($obj)
    {
        if (is_array($obj)) {
            $copy = [];
            foreach ($obj as $k => $v) {
                $copy[$k] = self::deepCopy($v);
            }
            return $copy;
        } elseif ($obj instanceof UizaObject) {
            return $obj::constructFrom(self::deepCopy($obj->_values));
        } else {
            return $obj;
        }
    }

    /**
     * Mass assigns attributes on the model.
     *
     * @param array $values
     * @param null|string|array|Util\RequestOptions $opts
     * @param boolean $dirty Defaults to true.
     */
    public function updateAttributes($values)
    {
        foreach ($values as $k => $v) {
            $this->_values[$k] = $v;
        }
    }
}