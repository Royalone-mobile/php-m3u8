<?php

namespace Chrisyue\PhpM3u8\Transformer;

/**
 * @Annotation
 */
class ResolutionTransformer extends AbstractTransformer
{
    public function supports($origin)
    {
        return is_string($origin) && preg_match('/\d+x\d+/', $origin);
    }

    protected function doTransform($origin)
    {
        list($width, $height) = explode('x', $origin);
        $width = (int) $width;
        $height = (int) $height;

        return compact('width', 'height');
    }
}
