<?php

namespace Chrisyue\PhpM3u8\Transformer;

class AttrTransformers implements AttrTransformersInterface
{
    private $transformers = [];

    public function set($key, AttrTransformerInterface $transformer)
    {
        $this->transformers[$key] = $transformer;
    }

    public function get($key)
    {
        if (isset($this->transformers[$key])) {
            return $this->transformers[$key];
        }
    }

    public function getKeyByName($name)
    {
        foreach ($this->transformers as $key => $transformer) {
            if ($transformer->supports($name)) {
                return $key;
            }
        }
    }
}
