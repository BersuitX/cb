<?php

namespace FastRoute\DataGenerator;

class GroupPosBased extends RegexBasedAbstract
{
    protected function getApproxChunkSize()
    {
        return 10;
    }

    protected function processChunk($Vyd5mz3mqz24)
    {
        $Vbfuui5cpnkv = [];
        $Vkulgdd3i0xr = [];
        $V5peram4ncbv = 1;
        foreach ($Vyd5mz3mqz24 as $Vkkdxriwdugo => $Vkihybm3bccb) {
            $Vkulgdd3i0xr[] = $Vkkdxriwdugo;
            $Vbfuui5cpnkv[$V5peram4ncbv] = [$Vkihybm3bccb->handler, $Vkihybm3bccb->variables];

            $V5peram4ncbv += count($Vkihybm3bccb->variables);
        }

        $Vkkdxriwdugo = '~^(?:' . implode('|', $Vkulgdd3i0xr) . ')$~';
        return ['regex' => $Vkkdxriwdugo, 'routeMap' => $Vbfuui5cpnkv];
    }
}
