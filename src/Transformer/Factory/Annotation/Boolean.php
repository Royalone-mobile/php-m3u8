<?php

namespace Chrisyue\PhpM3u8\Transformer\Factory\Annotation;

use Chrisyue\PhpM3u8\Transformer\BoolTransformer;
use Chrisyue\PhpM3u8\Transformer\Factory\FactoryInterface;

/**
 * @Annotation
 */
class Boolean implements FactoryInterface
{
    public function createTransformer()
    {
        return new BoolTransformer();
    }

    public function createReverser()
    {
        
    }
}
