<?php

namespace Chrisyue\PhpM3u8\Dumper;

use Chrisyue\PhpM3u8\Line\LinesInterface;
use Chrisyue\PhpM3u8\Transformer\ReverserInterface;
use Chrisyue\PhpM3u8\Line\Line;

class TagDumper implements ChildDumperInterface
{
    private $lines;

    private $name;

    private $sequence;

    private $reverser;

    private $repeatable;

    public function __construct(
        LinesInterface $lines,
        $name,
        $sequence,
        ReverserInterface $reverser = null,
        $repeatable = false
    ) {
        $this->lines = $lines;
        $this->name = $name;
        $this->sequence = $sequence;
        $this->reverser = $reverser;
        $this->repeatable = $repeatable;
    }

    public function dump($value)
    {
        if (null !== $this->reverser) {
            $value = $this->reverser->reverse($value);
        }

        $this->lines->write(new Line($this->name, $value));

        return $this;
    }

    public function isRepeatable()
    {
        return $this->repeatable;
    }

    public function getSequence()
    {
        return $this->sequence;
    }

    public function getLines()
    {
        return $this->lines;
    }
}
