<?php

namespace Chrisyue\PhpM3u8\Transformer;

/**
 * @Annotation
 */
class IntTransformer extends AbstractTransformer
{
    public function supports($origin)
    {
        return ctype_digit($origin);
    }

    protected function doTransform($origin)
    {
        return (int) $origin;
    }
}
