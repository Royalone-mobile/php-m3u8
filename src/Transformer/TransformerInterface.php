<?php

namespace Chrisyue\PhpM3u8\Transformer;

interface TransformerInterface
{
    public function transform($origin);

    public function supports($origin);
}
