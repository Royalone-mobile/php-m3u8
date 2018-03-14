<?php

namespace Chrisyue\PhpM3u8\Tests\M3u8\Transformer;

use PHPUnit\Framework\TestCase;
use Chrisyue\PhpM3u8\Transformer\ResolutionTransformer;

class ResolutionTransformerTest extends TestCase
{
    public function testTransform()
    {
        $transformer = new ResolutionTransformer();

        $this->assertSame(['width' => '1920', 'height' => '1080'], $transformer->transform('1920x1080'));
    }
}
