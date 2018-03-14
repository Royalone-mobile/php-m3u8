<?php

use Chrisyue\PhpM3u8\Document\Rfc8216\MediaPlaylist;
use Chrisyue\PhpM3u8\Document\Rfc8216\MasterPlaylist;
use Chrisyue\PhpM3u8\Stream\FileStream;
use Chrisyue\PhpM3u8\Line\Lines;
use Chrisyue\PhpM3u8\PdFactory\AnnotReadablePlaylistPdFactory;
use Chrisyue\PhpM3u8\PropertyReader\PropertyReader;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

error_reporting(E_ALL);

require 'vendor/autoload.php';

AnnotationRegistry::registerLoader('class_exists');
$factory = new AnnotReadablePlaylistPdFactory(
    new PropertyReader(new AnnotationReader()),
    // MediaPlaylist::class
    MasterPlaylist::class
);

$parser = $factory->createParser();
// $doc = $parser->parse(new Lines(new FileStream(new \SplFileObject('test.m3u8'))));
$doc = $parser->parse(new Lines(new FileStream(new \SplFileObject('test2.m3u8'))));

var_export($doc);
