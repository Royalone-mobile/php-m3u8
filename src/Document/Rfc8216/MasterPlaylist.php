<?php

namespace Chrisyue\PhpM3u8\Document\Rfc8216;

use Chrisyue\PhpM3u8\PdFactory\Annotation as M3u8;
use Chrisyue\PhpM3u8\Transformer\Factory\Annotation as TYPE;

class MasterPlaylist extends AbstractPlaylist
{
    /**
     * @M3u8\StreamInf
     */
    public $streamInfs = [];

    /**
     * @M3u8\Tag(
     *     name="#EXT-X-SESSION-KEY",
     *     repeatable=true,
     *     type=@TYPE\AttrList(class="Chrisyue\PhpM3u8\Document\Rfc8216\Tag\Key")
     * )
     */
    public $sessionKeys = [];
}
