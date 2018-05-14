<?php

namespace Chrisyue\PhpM3u8\Transformer;

/**
 * @Annotation
 */
class DelimiterTransformer extends AbstractTransformer
{
    private $delimiter;

    public function __construct($delimiter)
    {
        $this->delimiter = $delimiter;
    }

    public function supports($origin)
    {
        return is_string($origin);
    }

    protected function doTransform($origin)
    {
        return explode($this->delimiter, $origin);
    }
}
