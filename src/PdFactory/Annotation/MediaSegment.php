<?php

namespace Chrisyue\PhpM3u8\PdFactory\Annotation;

use Chrisyue\PhpM3u8\Parser\ParentChildParser;
use Chrisyue\PhpM3u8\Document\Rfc8216\MediaSegment as MediaSegmentDoc;
use Chrisyue\PhpM3u8\DataAccessor\ObjectAccessor;
use Chrisyue\PhpM3u8\Parser\Strategy\MediaSegmentStrategy;
use Chrisyue\PhpM3u8\Parser\Parsers;
use Chrisyue\PhpM3u8\PdFactory\AbstractParentAnnotReadableFactory;

/**
 * @Annotation
 */
class MediaSegment extends AbstractParentAnnotReadableFactory
{
    public function __construct(array $options)
    {
    }

    public function createParser()
    {
        return new ParentChildParser(
            $this->initParsers(new Parsers(), MediaSegmentDoc::class),
            new ObjectAccessor(new MediaSegmentDoc()),
            new MediaSegmentStrategy(),
            true
        );
    }

    public function createDumper()
    {
    }
}
