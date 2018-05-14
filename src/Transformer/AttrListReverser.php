<?php

namespace Chrisyue\PhpM3u8\Transformer;

use Chrisyue\PhpM3u8\DataAccessor\FactoryInterface;

class AttrListReverser implements ReverserInterface
{
    private $kvReverser;

    private $attrReversers;

    private $dataAccessorFactory;

    public function __construct(
        KvReverser $kvReverser,
        AttrReversersInterface $attrReversers,
        FactoryInterface $dataAccessorFactory
    ) {
        $this->kvReverser = $kvReverser;
        $this->attrReversers = $attrReversers;
        $this->dataAccessorFactory = $dataAccessorFactory;
    }

    public function reverse($transformed)
    {
        $attrs = [];

        $dataAccessor = $this->dataAccessorFactory->createByData($transformed);
        $this->attrReversers->iterate(function ($key, AttrReverserInterface $reverser) use ($dataAccessor, &$attrs) {
            $attrName = $reverser->getAttrName();

            $attrs[$attrName] = $reverser->reverse($dataAccessor->get($key));
        });

        return $this->kvReverser->reverse($attrs);
    }
}
