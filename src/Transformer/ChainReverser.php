<?php

namespace Chrisyue\PhpM3u8\Transformer;

class ChainReverser implements ReverserInterface
{
    private $reversers;

    public function __construct(array $reversers)
    {
        $this->reversers = $reversers;
    }

    public function reverse($transformed)
    {
        foreach ($this->reversers as $reverser) {
            $transformed = $reverser->reverse($transformed);
        }

        return $transformed;
    }
}
