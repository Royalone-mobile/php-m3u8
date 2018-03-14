<?php

namespace Chrisyue\PhpM3u8\Dumper;

interface ChildDumperInterface
{
    public function isRepeatable();

    public function getSequence();
}
