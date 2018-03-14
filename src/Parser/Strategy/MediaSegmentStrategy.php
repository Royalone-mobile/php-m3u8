<?php

namespace Chrisyue\PhpM3u8\Parser\Strategy;

use Chrisyue\PhpM3u8\DataAccessor\DataAccessorInterface;

/**
 * @Annotation
 */
class MediaSegmentStrategy implements StrategyInterface
{
    public function shouldParseNextLine(DataAccessorInterface $dataAccessor)
    {
        if (!$dataAccessor->isChanged()) {
            return false;
        }

        return null === $dataAccessor->get('uri');
    }
}
