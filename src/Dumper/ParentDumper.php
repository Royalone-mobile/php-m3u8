<?php

namespace Chrisyue\PhpM3u8\Dumper;

use Chrisyue\PhpM3u8\DataAccessor\FactoryInterface;

class ParentDumper implements DumperInterface
{
    private $dataAccessorFactory;

    private $children;

    public function __construct(FactoryInterface $dataAccessorFactory, array $children)
    {
        $this->dataAccessorFactory = $dataAccessorFactory;
        $this->children = $children;
    }

    public function setChild($key, ChildDumperInterface $child)
    {
        $this->children[$key] = $child;
    }

    public function dump($value)
    {
        uasort($this->children, function (ChildDumperInterface $child, ChildDumperInterface $child2) {
            return $child->getSequence() > $child2->getSequence();
        });

        $dataAccessor = $this->dataAccessorFactory->createByData($value);
        foreach ($this->children as $key => $child) {
            $childResult = $dataAccessor->get($key);
            if (null === $childResult) {
                continue;
            }

            $child->isRepeatable() ? array_walk($childResult, function ($val) use ($child) {
                $child->dump($val);
            }) : $child->dump($childResult);
        }
    }
}
