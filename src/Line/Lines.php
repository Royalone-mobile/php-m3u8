<?php

namespace Chrisyue\PhpM3u8\Line;

use Chrisyue\PhpM3u8\Stream\StreamInterface;
use Chrisyue\PhpM3u8\Line\LineInterface;

class Lines implements LinesInterface
{
    private $stream;

    public function __construct(StreamInterface $stream)
    {
        $this->stream = $stream;
    }

    public function read()
    {
        static $text, $line;

        if ($this->stream->getLine() !== $text) {
            $text = $this->stream->getLine();
            $line = Line::fromString($text);
        }

        return $line;
    }

    public function write(LineInterface $line)
    {
        $this->stream->putLine((string) $line);
    }

    public function goNext()
    {
        $this->stream->goNext();

        if (!$this->stream->isValid()) {
            return;
        }

        $line = trim($this->stream->getLine());
        if (empty($line)) {
            $this->goNext();
        }
    }

    public function isValid()
    {
        return $this->stream->isValid();
    }
}
