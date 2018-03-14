<?php

namespace Chrisyue\PhpM3u8\Document\Rfc8216\Tag;

use Chrisyue\PhpM3u8\Transformer\Factory\Annotation as TYPE;
use Chrisyue\PhpM3u8\Transformer\Factory\Annotation\Attr;

class StreamInf
{
    /**
     * @Attr(name="BANDWIDTH", type=@TYPE\Integer)
     */
    public $bandwidth;

    /**
     * @Attr(name="CODECS", type=@TYPE\SplittedAttrString(splitter=","))
     */
    public $codecs;

    /**
     * @Attr(name="RESOLUTION", type=@TYPE\Resolution)
     */
    public $resolution;

    public $uri;
}
