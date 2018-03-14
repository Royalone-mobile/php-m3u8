<?php

namespace Chrisyue\PhpM3u8\Parser;

use Chrisyue\PhpM3u8\Line\LineInterface;
use Chrisyue\PhpM3u8\Line\LinesInterface;

class UriParser implements ChildParserInterface
{
    public function parse(LinesInterface $lines)
    {
        return $lines->read()->getValue();
    }

    public function supports(LineInterface $line)
    {
        return $line->isCategory(LineInterface::CATEGORY_URI);
    }

    public function isRepeatable()
    {
        return false;
    }
}
