<?php

namespace Chrisyue\PhpM3u8\Parser;

use Chrisyue\PhpM3u8\Line\LineInterface;
use Chrisyue\PhpM3u8\Transformer\TransformerInterface;
use Chrisyue\PhpM3u8\Line\LinesInterface;

class TagParser implements ChildParserInterface
{
    private $line;

    private $transformer;

    private $repeatable;

    public function __construct(LineInterface $line, TransformerInterface $transformer = null, $repeatable = false)
    {
        $this->line = $line;
        $this->transformer = $transformer;
        $this->repeatable = $repeatable;
    }

    public function parse(LinesInterface $lines)
    {
        $line = $lines->read();
        $value = $line->getValue();

        if (null === $this->transformer) {
            return $value;
        }

        return $this->transformer->transform($value);
    }

    public function supports(LineInterface $line)
    {
        return $this->line->isSameType($line);
    }

    public function isRepeatable()
    {
        return $this->repeatable;
    }
}
