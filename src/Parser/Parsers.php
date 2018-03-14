<?php

namespace Chrisyue\PhpM3u8\Parser;

use Chrisyue\PhpM3u8\Line\LineInterface;

class Parsers implements ParsersInterface
{
    private $parsers = [];

    public function set($key, ChildParserInterface $parser)
    {
        $this->parsers[$key] = $parser;
    }

    public function getKeyForLine(LineInterface $line)
    {
        foreach ($this->parsers as $key => $parser) {
            if ($parser->supports($line)) {
                return $key;
            }
        }
    }

    public function get($key)
    {
        if (isset($this->parsers[$key])) {
            return $this->parsers[$key];
        }
    }
}
