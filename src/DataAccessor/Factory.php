<?php

namespace Chrisyue\PhpM3u8\DataAccessor;

class Factory implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createByData($data)
    {
        if (is_array($data)) {
            return new ArrayAccessor($data);
        }

        return new ObjectAccessor($data);
    }
}
