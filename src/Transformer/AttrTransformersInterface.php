<?php

namespace Chrisyue\PhpM3u8\Transformer;

interface AttrTransformersInterface
{
    public function set($key, AttrTransformerInterface $transformer);

    public function getKeyByName($name);

    public function get($key);
}
