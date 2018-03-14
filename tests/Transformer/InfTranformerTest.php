<?php

namespace Chrisyue\PhpM3u8\Tests\M3u8\Transformer;

use Chrisyue\PhpM3u8\Document\Rfc8216\Tag;
use PHPUnit\Framework\TestCase;
use Chrisyue\PhpM3u8\Transformer\InfTransformer;

class InfTransformerTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testTransform($origin, $transformed)
    {
        $transformer = new InfTransformer();

        $this->assertEquals($transformed, $transformer->transform($origin));
    }

    public function dataProvider()
    {
        $data = [];

        $origin = '100,';
        $transformed = new Tag\Inf();
        $transformed->duration = 100;

        $data[] = [$origin, $transformed];

        $origin = '200.123,hello world';
        $transformed = new Tag\Inf();
        $transformed->duration = 200.123;
        $transformed->title = 'hello world';

        $data[] = [$origin, $transformed];

        return $data;
    }
}
