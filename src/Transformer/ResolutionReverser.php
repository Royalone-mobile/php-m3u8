<?php

namespace Chrisyue\PhpM3u8\Transformer;

class ResolutionReverser implements ReverserInterface
{
    public function reverse($transformed)
    {
        return sprintf('%sx%s', $transformed['width'], $transformed['height']);
    }
}
