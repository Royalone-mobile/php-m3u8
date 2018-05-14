<?php

namespace Chrisyue\PhpM3u8\Dumper;

use Chrisyue\PhpM3u8\Line\LinesInterface;
use Chrisyue\PhpM3u8\Line\Line;

class UriDumper implements ChildDumperInterface
{
    private $lines;

    private $sequence;

    public function __construct(LinesInterface $lines, $sequence)
    {
        $this->lines = $lines;
        $this->sequence = $sequence;
    }

    public function getSequence()
    {
        return $this->sequence;
    }

    public function isRepeatable()
    {
        return false;
    }

    public function dump($uri)
    {
        $this->lines->write(new Line(null, $uri));
    }
}
