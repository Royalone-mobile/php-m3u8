<?php

namespace Chrisyue\PhpM3u8\PdFactory;

use Chrisyue\PhpM3u8\DataAccessor\ObjectAccessor;
use Chrisyue\PhpM3u8\Parser\Strategy\PlaylistStrategy;
use Chrisyue\PhpM3u8\PdFactory\PdFactoryInterface;
use Chrisyue\PhpM3u8\PropertyReader\PropertyReaderInterface;
use Chrisyue\PhpM3u8\Parser\Parsers;
use Chrisyue\PhpM3u8\Parser\ParentParser;

class AnnotReadablePlaylistPdFactory extends AbstractParentAnnotReadableFactory
{
    private $class;

    public function __construct(PropertyReaderInterface $reader, $class)
    {
        $this->setReader($reader);
        $this->class = $class;
    }

    public function createParser()
    {
        return new ParentParser(
            $this->initParsers(new Parsers(), $this->class),
            new ObjectAccessor(new $this->class),
            new PlaylistStrategy()
        );
    }

    public function createDumper()
    {
    }
}
