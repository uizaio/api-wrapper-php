<?php

class UizaObject implements \ArrayAccess, \Countable, \JsonSerializable {

	protected $_values;

	public function __construct($id = null, $opts = null)
    {
        $this->_values = [];
        $this->_originalValues = [];

        $this->_unsavedValues = new Util\Set();

        if ($id !== null) {
            $this->_values['id'] = $id;
        }
    }

    /**
     * Sets all keys within the object as unsaved so that they will be
     * included with an update when `serializeParameters` is called. This
     * method is also recursive, so any object contained as values or
     * which are values in a tenant array are also marked as dirty.
     */
    public function dirty()
    {
        $this->_unsavedValues = new Util\Set(array_keys($this->_values));
        foreach ($this->_values as $k => $v) {
            $this->dirtyValue($v);
        }
    }

    protected function dirtyValue($value)
    {
        if (is_array($value)) {
            foreach ($value as $v) {
                $this->dirtyValue($v);
            }
        } elseif ($value instanceof UizaObject) {
            $value->dirty();
        }
    }

	public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __get($name, $value) {
       	return $this->$name;
    }

    /**
     *
     *
     * @param array $values
     * @param null|string|array|Util\RequestOptions $opts
     *
     * @return StripeObject The object constructed from the given values.
     */
    public static function constructFrom($values, $opts = null)
    {
        $obj = new static(isset($values['id']) ? $values['id'] : null);
        $obj->refreshFrom($values, $opts);
        return $obj;
    }
}