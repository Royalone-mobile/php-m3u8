<?php

namespace Chrisyue\PhpM3u8\Transformer;

/**
 * @Annotation
 */
class DelimiterTransformer implements TransformerInterface
{
    private $delimiter;

    public function __construct($delimiter)
    {
        $this->delimiter = $delimiter;
    }

    public function transform($origin)
    {
        return explode($this->delimiter, $origin);
    }
}
