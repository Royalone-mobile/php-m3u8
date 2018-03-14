<?php

namespace Chrisyue\PhpM3u8\Transformer;

/**
 * @Annotation
 */
class ResolutionTransformer implements TransformerInterface
{
    public function transform($origin)
    {
        list($width, $height) = explode('x', $origin);

        return compact('width', 'height');
    }
}
