<?php

namespace Chrisyue\PhpM3u8\PropertyReader;

trait PropertyReaderAwareTrait
{
    private $reader;

    public function setReader(PropertyReaderInterface $reader)
    {
        $this->reader = $reader;
    }
}
