<?php

namespace Chrisyue\PhpM3u8\Transformer\Factory;

interface FactoryInterface
{
    public function createTransformer();

    public function createReverser();
}
