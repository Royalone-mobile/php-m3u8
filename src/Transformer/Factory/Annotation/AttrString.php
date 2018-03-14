<?php

namespace Chrisyue\PhpM3u8\Transformer\Factory\Annotation;

use Chrisyue\PhpM3u8\Transformer\Factory\FactoryInterface;
use Chrisyue\PhpM3u8\Transformer\QuotedStringTransformer;

/**
 * @Annotation
 */
class AttrString implements FactoryInterface
{
    public function createTransformer()
    {
        return new QuotedStringTransformer();
    }

    public function createReverser()
    {
        
    }
}
