<?php

namespace djstarcom\BookingComSDK\Models;

/**
 * Class Model
 * @package djstarcom\BookingComSDK\Models
 */
abstract class Model
{
    /**
     * @var array
     */
    protected static $attributeMap = [];

    /**
     * Model primary key. Adding to collection with this key.
     * @return string|int|null
     */
    public function getPrimaryKey()
    {
        return null;
    }

    /**
     * @param array $data
     */
    public function setAttributes(array $data): void
    {
        $prepareData = array_intersect_key($data, $this->getAttributeMap());

        foreach ($prepareData as $key => $value) {
            if (!property_exists($this, $key)) {
                continue;
            }
            $key        = str_replace('-', '_', $key);
            $this->$key = $value;
        }
    }

    /**
     * @return array
     */
    abstract protected function getAttributeMap(): array;

    /**
     * Converts the model into an array.
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * PHP getter magic method.
     *
     * @param string $name property name
     * @return mixed property value
     */
    public function __get($name)
    {
        if (!property_exists($this, $name)) {
            return null;
        }

        return $this->$name;
    }

    /**
     * PHP setter magic method.
     *
     * @param string $name property name
     * @param mixed $value property value
     */
    public function __set($name, $value): void
    {
        $this->$name = $value;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset($name)
    {
        return property_exists($this, $name);
    }
}
