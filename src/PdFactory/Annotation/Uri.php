<?php

namespace Chrisyue\PhpM3u8\PdFactory\Annotation;

use Chrisyue\PhpM3u8\PdFactory\PdFactoryInterface;
use Chrisyue\PhpM3u8\Parser\UriParser;

/**
 * @Annotation
 */
class Uri implements PdFactoryInterface
{
    public function createParser()
    {
        return new UriParser();
    }

    public function createDumper()
    {
        
    }
}
