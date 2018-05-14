<?php

namespace Chrisyue\PhpM3u8\Transformer;

interface AttrReversersInterface
{
    public function set($key, AttrReverserInterface $reverser);

    public function iterate(callable $callback);
}
