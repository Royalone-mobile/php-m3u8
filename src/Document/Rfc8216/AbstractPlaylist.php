<?php

namespace Chrisyue\PhpM3u8\Document\Rfc8216;

use Chrisyue\PhpM3u8\PdFactory\Annotation as M3u8;
use Chrisyue\PhpM3u8\Transformer\Factory\Annotation as TYPE;

abstract class AbstractPlaylist
{
    /**
     * @M3u8\Tag(name="#EXT-X-VERSION", sequence=0, type=@TYPE\Integer)
     */
    public $version;

    /**
     * @M3u8\Tag(name="#EXT-X-INDEPENDENT-SEGMENTS", sequence=0, type=@TYPE\Boolean)
     */
    public $independentSegments;
}
