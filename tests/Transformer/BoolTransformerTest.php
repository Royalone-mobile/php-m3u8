<?php

namespace Chrisyue\PhpM3u8\Tests\M3u8\Transformer;

use PHPUnit\Framework\TestCase;
use Chrisyue\PhpM3u8\Transformer\BoolTransformer;

class BoolTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new BoolTransformer();

        $this->assertTrue($transformer->transform(''));
    }
}
