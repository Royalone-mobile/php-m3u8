<?php

namespace Chrisyue\PhpM3u8\Transformer;

class KvReverser implements ReverserInterface
{
    public function reverse($attributes)
    {
        $attrs = [];
        foreach ($attributes as $key => $val) {
            $attrs[] = sprintf('%s=%s', $key, $val);
        }

        return implode(',', $attrs);
    }
}
