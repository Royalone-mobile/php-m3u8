<?php

namespace Chrisyue\PhpM3u8\Transformer;

class KvTransformer
{
    public function transform($origin)
    {
        preg_match_all('/(?<=^|,)[A-Z0-9-]+=("?).+?\1(?=,|$)/', $origin, $matches);

        $result = [];
        foreach ($matches[0] as $attr) {
            list($name, $value) = explode('=', $attr);
            $result[$name] = $value;
        }

        return $result;
    }
}
