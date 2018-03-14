<?php

namespace Chrisyue\PhpM3u8\Transformer;

/**
 * @Annotation
 */
class IntTransformer implements TransformerInterface
{
    public function transform($origin)
    {
        return (int) $origin;
    }
}
