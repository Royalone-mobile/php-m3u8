<?php

namespace Chrisyue\PhpM3u8\Parser;

use Chrisyue\PhpM3u8\Line\LinesInterface;
use Chrisyue\PhpM3u8\Line\LineInterface;
use Chrisyue\PhpM3u8\Transformer\AttrListTransformer;

class UriAwareAttrTagParser extends TagParser
{
    private $uriParser;

    private $dataAccessor;

    public function __construct(
        LineInterface $line,
        AttrListTransformer $transformer = null,
        ChildParserInterface $uriParser,
        $repeatable = false
    ) {
        parent::__construct($line, $transformer, $repeatable);

        $this->uriParser = $uriParser;
        $this->dataAccessor = $transformer->getDataAccessor();
    }

    public function parse(LinesInterface $lines)
    {
        parent::parse($lines);
        $lines->goNext();
        $this->dataAccessor->set('uri', $this->uriParser->parse($lines));

        return $this->dataAccessor->getData();
    }

    public function supports(LineInterface $line)
    {
        return parent::supports($line);
    }

    public function isRepeatable()
    {
        return true;
    }
}
