<?php

namespace FastRoute\DataGenerator;

class MarkBased extends RegexBasedAbstract
{
    protected function getApproxChunkSize()
    {
        return 30;
    }

    protected function processChunk($Vyd5mz3mqz24)
    {
        $Vbfuui5cpnkv = [];
        $Vkulgdd3i0xr = [];
        $Vivyanxq5m1i = 'a';
        foreach ($Vyd5mz3mqz24 as $Vkkdxriwdugo => $Vkihybm3bccb) {
            $Vkulgdd3i0xr[] = $Vkkdxriwdugo . '(*MARK:' . $Vivyanxq5m1i . ')';
            $Vbfuui5cpnkv[$Vivyanxq5m1i] = [$Vkihybm3bccb->handler, $Vkihybm3bccb->variables];

            ++$Vivyanxq5m1i;
        }

        $Vkkdxriwdugo = '~^(?|' . implode('|', $Vkulgdd3i0xr) . ')$~';
        return ['regex' => $Vkkdxriwdugo, 'routeMap' => $Vbfuui5cpnkv];
    }
}
