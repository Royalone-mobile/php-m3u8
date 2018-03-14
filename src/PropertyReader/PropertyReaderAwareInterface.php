<?php

namespace Chrisyue\PhpM3u8\PropertyReader;

interface PropertyReaderAwareInterface
{
    public function setReader(PropertyReaderInterface $reader);
}
