<?php

namespace Chrisyue\PhpM3u8\Line;

interface LinesInterface
{
    public function goNext();

    public function isValid();

    public function read();

    public function write(LineInterface $line);
}
