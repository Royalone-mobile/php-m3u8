<?php

namespace Chrisyue\PhpM3u8\PdFactory\Annotation;

use Chrisyue\PhpM3u8\PdFactory\PdFactoryInterface;
use Chrisyue\PhpM3u8\Parser\TagParser;
use Chrisyue\PhpM3u8\Line\Line;
use Chrisyue\PhpM3u8\Parser\UriParser;
use Chrisyue\PhpM3u8\Parser\StreamInfParser;
use Chrisyue\PhpM3u8\Transformer\Factory\Annotation\AttrList;
use Chrisyue\PhpM3u8\Parser\UriAwareAttrTagParser;
use Chrisyue\PhpM3u8\PropertyReader\PropertyReaderAwareInterface;
use Chrisyue\PhpM3u8\PropertyReader\PropertyReaderAwareTrait;
use Chrisyue\PhpM3u8\Line\LinesAwareInterface;
use Chrisyue\PhpM3u8\Line\LinesAwareTrait;
use Chrisyue\PhpM3u8\Dumper\UriAwareAttrTagDumper;

/**
 * @Annotation
 */
class StreamInf implements PdFactoryInterface, PropertyReaderAwareInterface, LinesAwareInterface
{
    use PropertyReaderAwareTrait;
    use LinesAwareTrait;

    private $sequence;

    public function __construct(array $options)
    {
        $this->sequence = $options['sequence'];
    }

    public function createParser()
    {
        return new UriAwareAttrTagParser(
            new Line('#EXT-X-STREAM-INF'),
            $this->getAttrFactory()->createTransformer(),
            new UriParser(),
            true
        );
    }

    public function createDumper()
    {
        return new UriAwareAttrTagDumper(
            $this->lines,
            '#EXT-X-STREAM-INF',
            $this->sequence,
            $this->getAttrFactory()->createReverser(),
            true
        );
    }

    private function getAttrFactory()
    {
        $attrFactory = new AttrList(['class' => 'Chrisyue\PhpM3u8\Document\Rfc8216\Tag\StreamInf']);
        $attrFactory->setReader($this->reader);

        return $attrFactory;
    }
}
