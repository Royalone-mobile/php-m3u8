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

    private $trFactory;

    public function __construct(array $options)
    {
        $this->attrName = $options['name'];
        if (isset($options['type'])) {
            $this->trFactory = $options['type'];
        }
    }

    public function createTransformer()
    {
        return $this->create('Transformer');
    }

    public function createReverser()
    {
        return $this->create('Reverser');
    }

    private function create($type)
    {
        $tr = null;
        if (null !== $this->trFactory) {
            $method = sprintf('create%s', $type);
            $tr = $this->trFactory->$method();
        }

        $class = sprintf('Chrisyue\PhpM3u8\Transformer\Attr%s', $type);

        return new $class($this->attrName, $tr);
    }
}
