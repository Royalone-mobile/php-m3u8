<?php

namespace Chrisyue\PhpM3u8\Transformer;

use Chrisyue\PhpM3u8\Document\Rfc8216\Tag\Inf;

/**
 * @Annotation
 */
class InfTransformer implements TransformerInterface
{
    public function transform($origin)
    {
        $inf = new Inf();
        list($duration, $inf->title) = explode(',', $origin, 2);

        $inf->duration = +$duration;

        return $inf;
    }
}
