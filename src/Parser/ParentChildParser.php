<?php

namespace Chrisyue\PhpM3u8\Parser;

use Chrisyue\PhpM3u8\Line\LineInterface;
use Chrisyue\PhpM3u8\Parser\ParsersInterface;
use Chrisyue\PhpM3u8\DataAccessor\DataAccessorInterface;
use Chrisyue\PhpM3u8\Parser\Strategy\StrategyInterface;

class ParentChildParser extends ParentParser implements ChildParserInterface
{
    private $repeatable;

    public function __construct(
        ParsersInterface $parsers,
        DataAccessorInterface $dataAccessor,
        StrategyInterface $strategy,
        $repeatable
    ) {
        $this->repeatable = $repeatable;
        parent::__construct($parsers, $dataAccessor, $strategy);
    }

    public function supports(LineInterface $line)
    {
        return null !== $this->getParsers()->getKeyForLine($line);
    }

    public function isRepeatable()
    {
        return $this->repeatable;
    }
}
