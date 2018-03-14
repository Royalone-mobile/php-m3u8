<?php

namespace Chrisyue\PhpM3u8\Transformer;

/**
 * @Annotation
 */
class ChainTransformer implements TransformerInterface
{
    private $transformers;

    public function __construct(array $transformers)
    {
        $this->transformers = $transformers;
    }

    public function transform($origin)
    {
        foreach ($this->transformers as $transformer) {
            $origin = $transformer->transform($origin);
        }

        return $origin;
    }
}
