<?php

namespace Chrisyue\PhpM3u8\DataAccessor;

class ArrayAccessor implements DataAccessorInterface
{
    private $data;

    private $changed;

    private $initData;

    public function __construct(array $initData = [])
    {
        $this->initData = $initData;
        $this->data = $this->initData;
    }

    public function add($key, $value)
    {
        $this->changed = true;
        $this->data[$key][] = $value;
    }

    public function set($key, $value)
    {
        $this->changed = true;
        $this->data[$key] = $value;
    }

    public function get($key)
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }
    }

    /**
     * @return array
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
        $this->data = $this->initData;
        $this->isChanged = false;
    }
}
