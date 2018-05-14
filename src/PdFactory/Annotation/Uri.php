<?php

namespace Chrisyue\PhpM3u8\PdFactory\Annotation;

use Chrisyue\PhpM3u8\PdFactory\PdFactoryInterface;
use Chrisyue\PhpM3u8\Parser\UriParser;
use Chrisyue\PhpM3u8\Line\LinesAwareInterface;
use Chrisyue\PhpM3u8\Line\LinesAwareTrait;

/**
 * @Annotation
 */
class Uri implements PdFactoryInterface, LinesAwareInterface
{
    use LinesAwareTrait;

    private $sequence;

    public function __construct(array $options)
    {
        $this->sequence = $options['sequence'];
    }

    public function createParser()
    {
        return new UriParser();
    }

    public function createDumper()
    {
        return new UriDumper($this->lines, $this->sequence);
    }
}
