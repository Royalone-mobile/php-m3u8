<?php

namespace Chrisyue\PhpM3u8\Transformer\Factory\Annotation;

use Chrisyue\PhpM3u8\Transformer\Factory\FactoryInterface;
use Chrisyue\PhpM3u8\Transformer\AttrTransformer;

/**
 * @Annotation
 */
class Attr implements FactoryInterface
{
    private $attrName;

    private $trBuilder;

    public function __construct(array $options)
    {
        $this->attrName = $options['name'];
        if (isset($options['type'])) {
            $this->trBuilder = $options['type'];
        }
    }

    public function createTransformer()
    {
        $transformer = null;
        if (null !== $this->trBuilder) {
            $transformer = $this->trBuilder->createTransformer();
        }

        return new AttrTransformer($this->attrName, $transformer);
    }

    public function createReverser()
    {
        
    }
}
