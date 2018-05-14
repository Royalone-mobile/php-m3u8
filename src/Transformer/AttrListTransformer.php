<?php

namespace Chrisyue\PhpM3u8\Transformer;

use Chrisyue\PhpM3u8\Transformer\KvTransformer;
use Chrisyue\PhpM3u8\DataAccessor\DataAccessorInterface;
use Chrisyue\PhpM3u8\Transformer\AttrTransformersInterface;

class AttrListTransformer extends AbstractTransformer
{
    private $kvTransformer;

    private $attrTransformers;

    private $dataAccessor;

    public function __construct(
        KvTransformer $kvTransformer,
        AttrTransformersInterface $attrTransformers,
        DataAccessorInterface $dataAccessor
    ) {
        $this->kvTransformer = $kvTransformer;
        $this->attrTransformers = $attrTransformers;
        $this->dataAccessor = $dataAccessor;
    }

    public function supports($origin)
    {
        return is_string($origin) && $this->kvTransformer->supports($origin);
    }

    public function getDataAccessor()
    {
        return $this->dataAccessor;
    }

    protected function doTransform($origin)
    {
        $attrs = $this->kvTransformer->transform($origin);
        $this->dataAccessor->reset();

        foreach ($attrs as $name => $value) {
            $key = $this->attrTransformers->getKeyByName($name);
            if (null !== $key) {
                $value = $this->attrTransformers->get($key)->transform($value);
                $this->dataAccessor->set($key, $value);
            }
        }

        return $this->dataAccessor->getData();
    }
}
