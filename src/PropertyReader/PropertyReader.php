<?php

namespace Chrisyue\PhpM3u8\PropertyReader;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

class PropertyReader implements PropertyReaderInterface
{
    private $annotReader;

    public function __construct(AnnotationReader $annotReader)
    {
        $this->annotReader = $annotReader;
    }

    public function read($class, $type)
    {
        $class = new \ReflectionClass($class);

        $annots = [];
        foreach ($class->getProperties() as $property) {
            $annot = $this->annotReader->getPropertyAnnotation($property, $type);
            if (null === $annot) {
                continue;
            }

            $annots[$property->getName()] = $annot;
        }

        return $annots;
    }
}
