<?php

namespace Chrisyue\PhpM3u8\Transformer;

class AttrTransformer extends AbstractTransformer implements AttrTransformerInterface
{
    private $attrName;

    private $valueTransformer;

    public function __construct($attrName, TransformerInterface $valueTransformer = null)
    {
        $this->attrName = $attrName;
        $this->valueTransformer = $valueTransformer;
    }

    public function supports($origin)
    {
        if (!is_string($origin)) {
            return false;
        }

        if (null === $this->valueTransformer) {
            return true;
        }

        return $this->valueTransformer->supports($origin);
    }

    public function supportsAttrName($attrName)
    {
        return $this->attrName === $attrName;
    }

    protected function doTransform($origin)
    {
        if (null === $this->valueTransformer) {
            return $origin;
        }

        return $this->valueTransformer->transform($origin);
    }
}
