<?php

namespace Chrisyue\PhpM3u8\Transformer;

class AttrReverser implements AttrReverserInterface
{
    private $attrName;

    private $valueReverser;

    public function __construct($attrName, ReverserInterface $valueReverser = null)
    {
        $this->attrName = $attrName;
        $this->valueReverser = $valueReverser;
    }

    public function reverse($transformed)
    {
        if (null === $this->valueReverser) {
            return $transformed;
        }

        return $this->valueReverser->reverse($transformed);
    }

    public function getAttrName()
    {
        return $this->attrName;
    }
}
