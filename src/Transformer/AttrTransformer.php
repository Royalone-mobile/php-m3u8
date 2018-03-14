<?php

namespace Chrisyue\PhpM3u8\Transformer;

class AttrTransformer implements AttrTransformerInterface
{
    private $attrName;

    private $valueTransformer;

    public function __construct($attrName, TransformerInterface $valueTransformer = null)
    {
        $this->attrName = $attrName;
        $this->valueTransformer = $valueTransformer;
    }

    public function transform($origin)
    {
        if (null === $this->valueTransformer) {
            return $origin;
        }

        return $this->valueTransformer->transform($origin);
    }

    public function supports($attrName)
    {
        return $this->attrName === $attrName;
    }
}
