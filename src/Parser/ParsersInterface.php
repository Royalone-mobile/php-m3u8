<?php

namespace Chrisyue\PhpM3u8\Parser;

use Chrisyue\PhpM3u8\Line\LineInterface;

interface ParsersInterface
{
    public function set($key, ChildParserInterface $parser);

    public function getKeyForLine(LineInterface $line);

    public function get($key);
}
