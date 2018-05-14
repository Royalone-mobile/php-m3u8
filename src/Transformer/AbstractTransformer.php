<?php

namespace Chrisyue\PhpM3u8\Transformer;

abstract class AbstractTransformer implements TransformerInterface
{
    public function transform($origin)
    {
        if (!$this->supports($origin)) {
            trigger_error(sprintf('Non-supported type for transformation'), E_USER_WARNING);

            return $origin;
        }

        return $this->doTransform($origin);
    }

    abstract protected function doTransform($origin);
}
