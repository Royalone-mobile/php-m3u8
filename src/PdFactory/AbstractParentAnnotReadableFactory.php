<?php

namespace Chrisyue\PhpM3u8\PdFactory;

use Chrisyue\PhpM3u8\Parser\ParsersInterface;
use Chrisyue\PhpM3u8\PropertyReader\PropertyReaderInterface;
use Chrisyue\PhpM3u8\PropertyReader\PropertyReaderAwareInterface;
use Chrisyue\PhpM3u8\PropertyReader\PropertyReaderAwareTrait;
use Chrisyue\PhpM3u8\Line\LinesAwareInterface;

abstract class AbstractParentAnnotReadableFactory implements PdFactoryInterface, PropertyReaderAwareInterface
{
    use PropertyReaderAwareTrait;

    protected function iterateFactories($class, \closure $callback)
    {
        foreach ($this->reader->read($class, PdFactoryInterface::class) as $key => $factory) {
            if ($factory instanceof PropertyReaderAwareInterface) {
                $factory->setReader($this->reader);
            }

            $callback($key, $factory);
        }
    }
}
