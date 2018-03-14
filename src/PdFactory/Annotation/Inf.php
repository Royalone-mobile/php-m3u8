<?php

namespace Chrisyue\PhpM3u8\PdFactory\Annotation;

use Chrisyue\PhpM3u8\PdFactory\PdFactoryInterface;
use Chrisyue\PhpM3u8\Parser\TagParser;
use Chrisyue\PhpM3u8\Transformer\InfTransformer;
use Chrisyue\PhpM3u8\Line\Line;

/**
 * @Annotation
 */
class Inf implements PdFactoryInterface
{
    public function createParser()
    {
        return new TagParser(
            new Line('#EXTINF'),
            new InfTransformer()
        );
    }

    public function createDumper()
    {
        
    }
}
