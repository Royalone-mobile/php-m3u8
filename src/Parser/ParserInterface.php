<?php

namespace Chrisyue\PhpM3u8\Parser;

use Chrisyue\PhpM3u8\Line\LinesInterface;

interface ParserInterface
{
    public function parse(LinesInterface $lines);
}
