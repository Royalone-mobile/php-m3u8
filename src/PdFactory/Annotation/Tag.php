<?php

namespace Chrisyue\PhpM3u8\PdFactory\Annotation;

use Chrisyue\PhpM3u8\Parser\TagParser;
use Chrisyue\PhpM3u8\Line\Line;
use Chrisyue\PhpM3u8\PdFactory\PdFactoryInterface;
use Chrisyue\PhpM3u8\PropertyReader\PropertyReaderAwareInterface;
use Chrisyue\PhpM3u8\PropertyReader\PropertyReaderInterface;
use Chrisyue\PhpM3u8\PropertyReader\PropertyReaderAwareTrait;

/**
 * @Annotation
 */
class Tag implements PdFactoryInterface, PropertyReaderAwareInterface
{
    use PropertyReaderAwareTrait;

    private $tagName;

    private $trFactory;

    private $repeatable;

    public function __construct(array $options)
    {
        $this->tagName = $options['name'];
        if (isset($options['type'])) {
            $this->trFactory = $options['type'];
        }
        $this->repeatable = !empty($options['repeatable']);
    }

    public function createParser()
    {
        $transformer = null;
        if (null !== $this->trFactory) {
            if ($this->trFactory instanceof PropertyReaderAwareInterface) {
                $this->trFactory->setReader($this->reader);
            }

            $transformer = $this->trFactory->createTransformer();
        }

        return new TagParser(new Line($this->tagName), $transformer, $this->repeatable);
    }

    public function createDumper()
    {
        
    }
}
