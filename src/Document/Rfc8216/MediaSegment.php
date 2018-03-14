<?php

namespace Chrisyue\PhpM3u8\Document\Rfc8216;

use Chrisyue\PhpM3u8\PdFactory\Annotation as M3u8;
use Chrisyue\PhpM3u8\Transformer\Factory\Annotation as TYPE;

class MediaSegment
{
    /**
     * @M3u8\Byterange
     */
    public $byterange;

    /**
     * @M3u8\Tag(name="#EXT-X-DISCONTINUITY", sequence=0, type=@TYPE\Boolean)
     */
    public $discontinuity;

    /**
     * @M3u8\Tag(
     *     name="#EXT-X-KEY",
     *     sequence=0,
     *     repeatable=true,
     *     type=@TYPE\AttrList(class="Chrisyue\PhpM3u8\Document\Rfc8216\Tag\Key")
     * )
     */
    public $keys = [];

    /**
     * @M3u8\Inf
     */
    public $inf;

    /**
     * @M3u8\Uri
     */
    public $uri;
}
