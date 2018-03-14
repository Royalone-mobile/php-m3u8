<?php

namespace Chrisyue\PhpM3u8\Dumper;

use Chrisyue\PhpM3u8\Line\LinesInterface;
use Chrisyue\PhpM3u8\Line\Line;

class UriDumper implements ChildDumperInterface
{
    private $lines;

    private $sequence;

    private $repeatable;

    public function __construct(LinesInterface $lines, $sequence, $repeatable = false)
    {
        $this->lines = $lines;
        $this->sequence = $sequence;
        $this->repeatable = $repeatable;
    }

    public function getSequence()
    {
        return $this->sequence;
    }

    public function isRepeatable()
    {
        return $this->repeatable;
    }

    public function dump($uri)
    {
        $this->lines->write(new Line(null, $uri));
    }
}
