<?php

namespace Chrisyue\PhpM3u8\Transformer;

use Chrisyue\PhpM3u8\Document\Rfc8216\Tag\Byterange;

/**
 * @Annotation
 */
class ByterangeTransformer implements TransformerInterface
{
    public function transform($origin)
    {
        $byterange = new Byterange();
        list($length, $offset) = array_pad(explode('@', $origin, 2), 2, null);

        $byterange->length = (int) $length;
        if (null !== $offset) {
            $byterange->offset = (int) $offset;
        }

        return $byterange;
    }
}
