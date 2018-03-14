<?php

namespace Chrisyue\PhpM3u8\Transformer;

/**
 * @Annotation
 */
class BoolTransformer implements TransformerInterface
{
    public function transform($value)
    {
        return true;
    }
}
