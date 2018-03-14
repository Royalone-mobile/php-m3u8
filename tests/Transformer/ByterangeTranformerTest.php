<?php

namespace Chrisyue\PhpM3u8\Tests\M3u8\Transformer;

use Chrisyue\PhpM3u8\Document\Rfc8216\Tag;
use PHPUnit\Framework\TestCase;
use Chrisyue\PhpM3u8\Transformer\ByterangeTransformer;

class ByterangeTranformerTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testTransform($origin, $transformed)
    {
        $transformer = new ByterangeTransformer();

        $this->assertEquals($transformed, $transformer->transform($origin));
    }

    public function dataProvider()
    {
        $data = [];

        $origin = '100';
        $transformed = new Tag\Byterange();
        $transformed->length = 100;

        $data[] = [$origin, $transformed];

        $origin = '222@333';
        $transformed = new Tag\Byterange();
        $transformed->length = 222;
        $transformed->offset = 333;

        $data[] = [$origin, $transformed];

        return $data;
    }
}
