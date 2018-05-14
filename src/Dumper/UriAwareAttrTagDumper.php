<?php

namespace Chrisyue\PhpM3u8\Dumper;

use Chrisyue\PhpM3u8\Line\LinesInterface;
use Chrisyue\PhpM3u8\Transformer\ReverserInterface;
use Chrisyue\PhpM3u8\DataAccessor\Factory;
use Chrisyue\PhpM3u8\Line\Line;

class UriAwareAttrTagDumper extends TagDumper
{
    private $dataAccessorFactory;

    public function __construct(
        LinesInterface $lines,
        $name,
        $sequence,
        ReverserInterface $reverser = null,
        $repeatable = false
    ) {
        parent::__construct($lines, $name, $sequence, $reverser, $repeatable);

        $this->dataAccessorFactory = new Factory();
    }

    public function dump($value)
    {
        parent::dump($value);

        $this->getLines()->write(new Line(null, $this->dataAccessorFactory->createByData($value)->get('uri')));
    }
}
