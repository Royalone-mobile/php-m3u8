<?php

namespace Chrisyue\PhpM3u8\PdFactory\Annotation;

use Chrisyue\PhpM3u8\PdFactory\PdFactoryInterface;
use Chrisyue\PhpM3u8\Transformer\ByterangeTransformer;
use Chrisyue\PhpM3u8\Line\Line;
use Chrisyue\PhpM3u8\Parser\TagParser;

/**
 * @Annotation
 */
class Byterange implements PdFactoryInterface
{
    public function createParser()
    {
        return new TagParser(
            new Line('#EXT-X-BYTERANGE'),
            new ByterangeTransformer()
        );
    }

    public function createDumper()
    {
        
    }
}
