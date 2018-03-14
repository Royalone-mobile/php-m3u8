<?php

namespace Chrisyue\PhpM3u8\PdFactory;

interface PdFactoryInterface
{
    public function createParser();

    public function createDumper();
}
