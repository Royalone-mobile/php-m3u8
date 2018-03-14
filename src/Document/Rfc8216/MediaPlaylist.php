<?php

namespace Chrisyue\PhpM3u8\Document\Rfc8216;

use Chrisyue\PhpM3u8\PdFactory\Annotation as M3u8;
use Chrisyue\PhpM3u8\Transformer\Factory\Annotation as TYPE;

class MediaPlaylist extends AbstractPlaylist
{
    /**
     * @M3u8\Tag(name="#EXT-X-TARGETDURATION", sequence=0, type=@TYPE\Integer)
     */
    public $targetduration;

    /**
     * @M3u8\Tag(name="#EXT-X-MEDIA-SEQUENCE", sequence=0, type=@TYPE\Integer)
     */
    public $mediaSequence;

    /**
     * @M3u8\Tag(name="#EXT-X-DISCONTINUITY-SEQUENCE", sequence=0, type=@TYPE\Integer)
     */
    public $discontinuitySequence;

    /**
     * @M3u8\Tag(name="#EXT-X-PLAYLIST-TYPE", sequence=0)
     */
    public $playlistType;

    /**
     * @M3u8\Tag(name="#EXT-X-I-FRAMES-ONLY", sequence=0, type=@TYPE\Boolean)
     */
    public $iFramesOnly;

    /**
     * @M3u8\MediaSegment
     */
    public $mediaSegments = [];

    /**
     * @M3u8\Tag(name="#EXT-X-ENDLIST", sequence=2, type=@TYPE\Boolean)
     */
    public $endlist;
}
