<?php

namespace Chrisyue\PhpM3u8\Transformer;

/**
 * @Annotation
 */
class ChainTransformer extends AbstractTransformer
{
    private $transformers;

    public function __construct(array $transformers)
    {
        $this->transformers = $transformers;
    }

    public function supports($origin)
    {
        return $this->transformers[0]->supports($origin);
    }

    protected function doTransform($origin)
    {
        foreach ($this->transformers as $transformer) {
            $origin = $transformer->transform($origin);
        }

        return $origin;
    }
}
