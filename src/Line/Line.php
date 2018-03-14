<?php

namespace Chrisyue\PhpM3u8\Line;

class Line implements LineInterface
{
    private $tag;

    private $value;

    public function __construct($tag = null, $value = null)
    {
        $this->tag = $tag;
        $this->value = $value;
    }

    public function isSameType(LineInterface $line)
    {
        return $line->getTag() === $this->tag;
    }

    public function getTag()
    {
        return $this->tag;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function isCategory($type)
    {
        return $this->getCategory() === $type;
    }

    static public function fromString($line)
    {
        $line = trim($line);
        if (empty($line)) {
            return;
        }

        if ('#' !== $line[0]) {
            return new Line(null, $line);
        }

        if (strlen($line) < 2) {
            return;
        }

        list($tag, $value) = array_pad(explode(':', $line, 2), 2, '');

        return new self($tag, $value);
    }

    public function __toString()
    {
        if ($this->isCategory(LineInterface::CATEGORY_URI)) {
            return $this->value;
        }

        if (is_bool($this->value)) {
            if ($this->value) {
                return $this->tag;
            }

            return '';
        }

        return sprintf('%s:%s', $this->tag, $this->value);
    }

    private function getCategory()
    {
        if (null !== $this->tag) {
            return LineInterface::CATEGORY_TAG;
        }

        return LineInterface::CATEGORY_URI;
    }
}
