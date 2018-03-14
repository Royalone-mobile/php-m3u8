<?php

namespace Chrisyue\PhpM3u8\Transformer\Factory\Annotation;

use Chrisyue\PhpM3u8\Transformer\Factory\FactoryInterface;
use Chrisyue\PhpM3u8\Transformer\IntTransformer;

/**
 * @Annotation
 */
class Integer implements FactoryInterface
{
    public function createTransformer()
    {
        return new IntTransformer();
    }

    public function createReverser()
    {
        
    }
}
