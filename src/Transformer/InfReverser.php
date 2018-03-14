<?php

namespace Chrisyue\PhpM3u8\Transformer;

class InfReverser implements ReverserInterface
{
    public function reverse($inf)
    {
        $format = '%d,%s';
        if (is_float($inf->duration)) {
            $format = '%.3f,%s';
        }

        return sprintf($format, $inf->duration, $inf->title);
    }
}
