<?php

namespace Chrisyue\PhpM3u8\Transformer;

use Chrisyue\PhpM3u8\Document\Rfc8216\Tag\Inf;

/**
 * @Annotation
 */
class InfTransformer extends AbstractTransformer
{
    public function supports($origin)
    {
        return is_string($origin) && preg_match('/^\d+(\.\d+)?,/');
    }

    protected function doTransform($origin)
    {
        $inf = new Inf();
        list($duration, $inf->title) = explode(',', $origin, 2);

        $inf->duration = +$duration;

        return $inf;
    }
}
