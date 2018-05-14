<?php

namespace Chrisyue\PhpM3u8\Transformer;

interface AttrTransformerInterface extends TransformerInterface
{
    public function supportsAttrName($attrName);
}
