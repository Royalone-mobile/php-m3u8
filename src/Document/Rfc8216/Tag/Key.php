<?php

namespace Chrisyue\PhpM3u8\Document\Rfc8216\Tag;

use Chrisyue\PhpM3u8\Transformer\Factory\Annotation as TYPE;
use Chrisyue\PhpM3u8\Transformer\Factory\Annotation\Attr;

class Key
{
    /**
     * @Attr(name="METHOD")
     */
    public $method;

    /**
     * @Attr(name="URI", type=@TYPE\AttrString)
     */
    public $uri;

    /**
     * @Attr(name="IV")
     */
    public $iv;
}
