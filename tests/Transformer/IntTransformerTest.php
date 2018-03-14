<?php

namespace Chrisyue\PhpM3u8\Tests\M3u8\Transformer;

use PHPUnit\Framework\TestCase;
use Chrisyue\PhpM3u8\Transformer\IntTransformer;

class IntTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new IntTransformer();

        $this->assertSame(1, $transformer->transform('1'));
    }
}
