<?php

namespace Chrisyue\PhpM3u8\Transformer;

class KvTransformer extends AbstractTransformer
{
    public function supports($origin)
    {
        return is_string($origin) && preg_match('/^[A-Z][A-Z0-9]*=[^=]+/', $origin);
    }

    protected function doTransform($origin)
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
