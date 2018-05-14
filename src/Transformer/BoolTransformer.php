<?php

namespace Chrisyue\PhpM3u8\Transformer;

/**
 * @Annotation
 */
class BoolTransformer extends AbstractTransformer
{
    public function supports($origin)
    {
        return is_string($origin) && empty($origin);
    }

    protected function doTransform($origin)
    {
        return true;
    }
}
