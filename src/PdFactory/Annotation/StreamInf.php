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

/**
 * @Annotation
 */
class StreamInf implements PdFactoryInterface, PropertyReaderAwareInterface
{
    use PropertyReaderAwareTrait;

    public function createParser()
    {
        $attrFactory = new AttrList(['class' => 'Chrisyue\PhpM3u8\Document\Rfc8216\Tag\StreamInf']);
        $attrFactory->setReader($this->reader);

        return new UriAwareAttrTagParser(
            new Line('#EXT-X-STREAM-INF'),
            $attrFactory->createTransformer(),
            new UriParser(),
            true
        );
    }

    public function createDumper()
    {
        
    }
}
