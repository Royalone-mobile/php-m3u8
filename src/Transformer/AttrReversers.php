<?php

namespace Chrisyue\PhpM3u8\Transformer;

class AttrReversers implements AttrReversersInterface
{
    private $reversers;

    public function set($key, AttrReverserInterface $reverser)
    {
        $this->reversers[$key] = $reverser;
    }

    public function iterate(callable $callback)
    {
        foreach ($this->reversers as $key => $reverser) {
            $callback($key, $reverser);
        }
    }
}
