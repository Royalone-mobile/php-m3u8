<?php

namespace Chrisyue\PhpM3u8\Transformer\Factory\Annotation;

use Chrisyue\PhpM3u8\Transformer\ResolutionTransformer;
use Chrisyue\PhpM3u8\Transformer\Factory\FactoryInterface;
use Chrisyue\PhpM3u8\Transformer\ResolutionReverser;

/**
 * @Annotation
 */
class Resolution implements FactoryInterface
{
    public function createTransformer()
    {
        return new ResolutionTransformer();
    }

    public function createReverser()
    {
        return new ResolutionReverser();
    }
}
