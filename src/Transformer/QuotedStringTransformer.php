<?php

namespace Chrisyue\PhpM3u8\Transformer;

/**
 * @Annotation
 */
class QuotedStringTransformer extends AbstractTransformer
{
    public function supports($origin)
    {
        return is_string($origin) && preg_match('/^"[^"]+"$/', $origin);
    }

    protected function doTransform($origin)
    {
        return trim($origin, '"');
    }
}
