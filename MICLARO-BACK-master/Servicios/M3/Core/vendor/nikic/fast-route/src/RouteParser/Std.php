<?php

namespace FastRoute\RouteParser;

use FastRoute\BadRouteException;
use FastRoute\RouteParser;


class Std implements RouteParser
{
    const VARIABLE_REGEX = <<<'REGEX'
\{
    \s* ([a-zA-Z_][a-zA-Z0-9_-]*) \s*
    (?:
        : \s* ([^{}]*(?:\{(?-1)\}[^{}]*)*)
    )?
\}
REGEX;
    const DEFAULT_DISPATCH_REGEX = '[^/]+';

    public function parse($Vkihybm3bccb)
    {
        $Vkihybm3bccbWithoutClosingOptionals = rtrim($Vkihybm3bccb, ']');
        $Vdjb1t3qu5xl = strlen($Vkihybm3bccb) - strlen($Vkihybm3bccbWithoutClosingOptionals);

        
        $Vlz1o0gvqnp4 = preg_split('~' . self::VARIABLE_REGEX . '(*SKIP)(*F) | \[~x', $Vkihybm3bccbWithoutClosingOptionals);
        if ($Vdjb1t3qu5xl !== count($Vlz1o0gvqnp4) - 1) {
            
            if (preg_match('~' . self::VARIABLE_REGEX . '(*SKIP)(*F) | \]~x', $Vkihybm3bccbWithoutClosingOptionals)) {
                throw new BadRouteException('Optional segments can only occur at the end of a route');
            }
            throw new BadRouteException("Number of opening '[' and closing ']' does not match");
        }

        $Vtc3lukzhm4i = '';
        $Vkihybm3bccbDatas = [];
        foreach ($Vlz1o0gvqnp4 as $V4qixmekps3e => $Vq5fkthtn5k4) {
            if ($Vq5fkthtn5k4 === '' && $V4qixmekps3e !== 0) {
                throw new BadRouteException('Empty optional part');
            }

            $Vtc3lukzhm4i .= $Vq5fkthtn5k4;
            $Vkihybm3bccbDatas[] = $this->parsePlaceholders($Vtc3lukzhm4i);
        }
        return $Vkihybm3bccbDatas;
    }

    
    private function parsePlaceholders($Vkihybm3bccb)
    {
        if (!preg_match_all(
            '~' . self::VARIABLE_REGEX . '~x', $Vkihybm3bccb, $Virbphhh55ue,
            PREG_OFFSET_CAPTURE | PREG_SET_ORDER
        )) {
            return [$Vkihybm3bccb];
        }

        $V5peram4ncbv = 0;
        $Vkihybm3bccbData = [];
        foreach ($Virbphhh55ue as $V1guocehqkuk) {
            if ($V1guocehqkuk[0][1] > $V5peram4ncbv) {
                $Vkihybm3bccbData[] = substr($Vkihybm3bccb, $V5peram4ncbv, $V1guocehqkuk[0][1] - $V5peram4ncbv);
            }
            $Vkihybm3bccbData[] = [
                $V1guocehqkuk[1][0],
                isset($V1guocehqkuk[2]) ? trim($V1guocehqkuk[2][0]) : self::DEFAULT_DISPATCH_REGEX
            ];
            $V5peram4ncbv = $V1guocehqkuk[0][1] + strlen($V1guocehqkuk[0][0]);
        }

        if ($V5peram4ncbv !== strlen($Vkihybm3bccb)) {
            $Vkihybm3bccbData[] = substr($Vkihybm3bccb, $V5peram4ncbv);
        }

        return $Vkihybm3bccbData;
    }
}
