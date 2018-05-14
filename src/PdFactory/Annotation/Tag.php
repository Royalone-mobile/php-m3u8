<?php

namespace Chrisyue\PhpM3u8\PdFactory\Annotation;

use Chrisyue\PhpM3u8\Parser\TagParser;
use Chrisyue\PhpM3u8\Line\Line;
use Chrisyue\PhpM3u8\PdFactory\PdFactoryInterface;
use Chrisyue\PhpM3u8\PropertyReader\PropertyReaderAwareInterface;
use Chrisyue\PhpM3u8\PropertyReader\PropertyReaderInterface;
use Chrisyue\PhpM3u8\PropertyReader\PropertyReaderAwareTrait;
use Chrisyue\PhpM3u8\Line\LinesAwareInterface;
use Chrisyue\PhpM3u8\Line\LinesAwareTrait;
use Chrisyue\PhpM3u8\Dumper\TagDumper;

/**
 * @Annotation
 */
class Tag implements PdFactoryInterface, PropertyReaderAwareInterface, LinesAwareInterface
{
    use PropertyReaderAwareTrait;
    use LinesAwareTrait;

    private $tagName;

    private $trFactory;

    private $repeatable;

    private $sequence;

    public function __construct(array $options)
    {
        $this->tagName = $options['name'];
        if (isset($options['type'])) {
            $this->trFactory = $options['type'];
        }
        $this->repeatable = !empty($options['repeatable']);
        $this->sequence = $options['sequence'];
    }

    public function createParser()
    {
        return new TagParser(
            new Line($this->tagName),
            $this->createTr('transformer'),
            $this->repeatable
        );
    }

    public function createDumper()
    {
        return new TagDumper(
            $this->lines,
            $this->tagName,
            $this->sequence,
            $this->createTr('reverser'),
            $this->repeatable
        );
    }

    private function createTr($tr)
    {
        if (null === $this->trFactory) {
            return;
        }

        if ($this->trFactory instanceof PropertyReaderAwareInterface) {
            $this->trFactory->setReader($this->reader);
        }

        $method = sprintf('create%s', $tr);

        return $this->trFactory->$method();
    }
}
