<?php

namespace Chrisyue\PhpM3u8\Line;

trait LinesAwareTrait
{
    private $lines;

    public function setLines(LinesInterface $lines)
    {
        $this->lines = $lines;
    }
}
