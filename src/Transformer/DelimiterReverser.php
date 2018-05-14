<?php

namespace Chrisyue\PhpM3u8\Transformer;

class DelimiterReverser implements ReverserInterface
{
    private $delimiter;

    public function reverse($transformed)
    {
        return implode($this->delimiter, $transformed);
    }
}
