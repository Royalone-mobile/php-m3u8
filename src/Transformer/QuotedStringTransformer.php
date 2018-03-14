<?php

namespace Chrisyue\PhpM3u8\Transformer;

/**
 * @Annotation
 */
class QuotedStringTransformer implements TransformerInterface
{
    public function transform($origin)
    {
        return trim($origin, '"');
    }
}
