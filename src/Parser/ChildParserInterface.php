<?php

namespace Chrisyue\PhpM3u8\Parser;

use Chrisyue\PhpM3u8\Line\LineInterface;

interface ChildParserInterface extends ParserInterface
{
    public function supports(LineInterface $line);

    public function isRepeatable();
}
