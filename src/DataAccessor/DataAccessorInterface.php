<?php

namespace Chrisyue\PhpM3u8\DataAccessor;

interface DataAccessorInterface
{
    public function add($key, $value);

    public function set($key, $value);

    public function get($key);

    /**
     * @return array|object
     */
    public function getData();

    public function isChanged();

    public function reset();
}
