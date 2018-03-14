<?php

namespace Chrisyue\PhpM3u8\Dumper;

use Chrisyue\PhpM3u8\DataAccessor\FactoryInterface;

class ParentChildDumper extends ParentDumper implements ChildDumperInterface
{
    private $repeatable;

    private $sequence;

    public function __construct(
        FactoryInterface $dataAccessorFactory,
        array $children,
        $sequence,
        $repeatable = false
    ) {
        parent::__construct($dataAccessorFactory, $children);

        $this->sequence = $sequence;
        $this->repeatable = $repeatable;
    }

    public function isRepeatable()
    {
        return $this->repeatable;
    }

    public function getSequence()
    {
        return $this->sequence;
    }
}
