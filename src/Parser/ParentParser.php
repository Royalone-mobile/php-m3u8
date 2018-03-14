<?php

namespace Chrisyue\PhpM3u8\Parser;

use Chrisyue\PhpM3u8\Parser\Strategy\StrategyInterface;
use Chrisyue\PhpM3u8\DataAccessor\DataAccessorInterface;
use Chrisyue\PhpM3u8\Line\LinesInterface;

class ParentParser implements ParserInterface
{
    private $parsers;

    private $dataAccessor;

    private $strategy;

    public function __construct(
        ParsersInterface $parsers,
        DataAccessorInterface $dataAccessor,
        StrategyInterface $strategy
    ) {
        $this->parsers = $parsers;
        $this->dataAccessor = $dataAccessor;
        $this->strategy = $strategy;
    }

    public function parse(LinesInterface $lines)
    {
        $this->dataAccessor->reset();

        do {
            $line = $lines->read();

            $key = $this->parsers->getKeyForLine($line);
            if (null !== $key) {
                $this->parseLinesByKey($lines, $key);
            }
        } while ($this->strategy->shouldParseNextLine($this->dataAccessor) && $this->moveToNextLine($lines));

        return $this->dataAccessor->getData();
    }

    protected function getParsers()
    {
        return $this->parsers;
    }

    private function parseLinesByKey(LinesInterface $lines, $key)
    {
        $parser = $this->parsers->get($key);
        $parsed = $parser->parse($lines);

        $method = $parser->isRepeatable() ? 'add' : 'set';
        $this->dataAccessor->$method($key, $parsed);
    }

    private function moveToNextLine(LinesInterface $lines)
    {
        $lines->goNext();

        return $lines->isValid();
    }
}
