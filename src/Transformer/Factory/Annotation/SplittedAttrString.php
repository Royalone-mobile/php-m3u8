<?php

namespace Chrisyue\PhpM3u8\Transformer\Factory\Annotation;

use Chrisyue\PhpM3u8\Transformer\Factory\FactoryInterface;
use Chrisyue\PhpM3u8\Transformer\ChainTransformer;
use Chrisyue\PhpM3u8\Transformer\QuotedStringTransformer;
use Chrisyue\PhpM3u8\Transformer\DelimiterTransformer;
use Chrisyue\PhpM3u8\Transformer\ChainReverser;
use Chrisyue\PhpM3u8\Transformer\DelimiterReverser;
use Chrisyue\PhpM3u8\Transformer\QuotedStringReverser;

/**
 * @Annotation
 */
class SplittedAttrString implements FactoryInterface
{
    private $delimiter;

    public function __construct(array $options)
    {
        $this->delimiter = $options['splitter'];
    }

    public function createTransformer()
    {
        return new ChainTransformer([
            new QuotedStringTransformer(),
            new DelimiterTransformer($this->delimiter),
        ]);
    }

    public function createReverser()
    {
        return new ChainReverser([
            new DelimiterReverser($this->delimiter),
            new QuotedStringReverser()
        ]);
    }
}
