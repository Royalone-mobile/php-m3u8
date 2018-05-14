<?php

namespace Chrisyue\PhpM3u8\PdFactory;

use Chrisyue\PhpM3u8\DataAccessor\ObjectAccessor;
use Chrisyue\PhpM3u8\Parser\Strategy\PlaylistStrategy;
use Chrisyue\PhpM3u8\PdFactory\PdFactoryInterface;
use Chrisyue\PhpM3u8\PropertyReader\PropertyReaderInterface;
use Chrisyue\PhpM3u8\Parser\Parsers;
use Chrisyue\PhpM3u8\Parser\ParentParser;
use Chrisyue\PhpM3u8\DataAccessor\Factory;
use Chrisyue\PhpM3u8\Line\LinesAwareInterface;
use Chrisyue\PhpM3u8\Line\LinesInterface;
use Chrisyue\PhpM3u8\Dumper\ParentDumper;

class AnnotReadablePlaylistPdFactory extends AbstractParentAnnotReadableFactory
{
    private $class;

    private $lines;

    public function __construct(PropertyReaderInterface $reader, $class, LinesInterface $lines = null)
    {
        $this->setReader($reader);
        $this->class = $class;
        $this->lines = $lines;
    }

    public function createParser()
    {
        $parsers = new Parsers();
        $this->iterateFactories($this->class, function ($key, PdFactoryInterface $factory) use ($parsers) {
            $parsers->set($key, $factory->createParser());
        });

        return new ParentParser($parsers, new ObjectAccessor(new $this->class), new PlaylistStrategy());
    }

    public function createDumper()
    {
        $dumpers = [];
        $this->iterateFactories($this->class, function ($key, PdFactoryInterface $factory) use (&$dumpers) {
            if ($factory instanceof LinesAwareInterface) {
                $factory->setLines($this->lines);
            }

            $dumpers[$key] = $factory->createDumper();
        });

        return new ParentDumper(new Factory(), $dumpers);
    }
}
