<?php

namespace Chrisyue\PhpM3u8\DataAccessor;

class ObjectAccessor implements DataAccessorInterface
{
    private $initData;

    private $data;

    private $changed;

    /**
     * @param object $initData
     */
    public function __construct($initData)
    {
        $this->initData = $initData;
        $this->data = clone $this->initData;
    }

    public function add($key, $value)
    {
        $this->data->$key[] = $value;
        $this->changed = true;
    }

    public function set($key, $value)
    {
        $this->data->$key = $value;
        $this->changed = true;
    }

    public function get($key)
    {
        return $this->data->$key;
    }

    /**
     * @return object
     */
    public function getData()
    {
        return $this->data;
    }

    public function isChanged()
    {
        return $this->changed;
    }

    public function reset()
    {
        $this->data = clone $this->initData;
        $this->changed = false;
    }
}
