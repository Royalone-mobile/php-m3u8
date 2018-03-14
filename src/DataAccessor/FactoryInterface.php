<?php

namespace Chrisyue\PhpM3u8\DataAccessor;

interface FactoryInterface
{
    /**
     * @param object|array $data
     * @return ArrayAccessor|ObjectAccessor
     */
    public function createByData($data);
}
