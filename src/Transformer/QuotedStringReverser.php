<?php

namespace Chrisyue\PhpM3u8\Transformer;

class QuotedStringReverser implements ReverserInterface
{
    public function reverse($transformed)
    {
        return sprintf("%s", $transformed);
    }
}
