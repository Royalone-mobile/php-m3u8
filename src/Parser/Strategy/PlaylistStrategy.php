<?php

namespace Chrisyue\PhpM3u8\Parser\Strategy;

use Chrisyue\PhpM3u8\DataAccessor\DataAccessorInterface;

class PlaylistStrategy implements StrategyInterface
{
    public function shouldParseNextLine(DataAccessorInterface $dataAccessor)
    {
        return true;
    }
}
