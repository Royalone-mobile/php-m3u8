<?php

namespace Chrisyue\PhpM3u8\Line;

interface LineInterface
{
    const CATEGORY_URI = 'uri';

    const CATEGORY_TAG = 'tag';

    static public function fromString($string);

    public function __toString();

    public function isSameType(LineInterface $line);

    public function getTag();

    public function getValue();

    public function isCategory($category);
}
