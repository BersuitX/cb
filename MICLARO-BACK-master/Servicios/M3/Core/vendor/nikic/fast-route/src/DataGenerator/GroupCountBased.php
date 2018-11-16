<?php

namespace FastRoute\DataGenerator;

class GroupCountBased extends RegexBasedAbstract
{
    protected function getApproxChunkSize()
    {
        return 10;
    }

    protected function processChunk($Vyd5mz3mqz24)
    {
        $Vbfuui5cpnkv = [];
        $Vkulgdd3i0xr = [];
        $Vgz2ahgrwzjk = 0;
        foreach ($Vyd5mz3mqz24 as $Vkkdxriwdugo => $Vkihybm3bccb) {
            $Vfg5rvwy5tel = count($Vkihybm3bccb->variables);
            $Vgz2ahgrwzjk = max($Vgz2ahgrwzjk, $Vfg5rvwy5tel);

            $Vkulgdd3i0xr[] = $Vkkdxriwdugo . str_repeat('()', $Vgz2ahgrwzjk - $Vfg5rvwy5tel);
            $Vbfuui5cpnkv[$Vgz2ahgrwzjk + 1] = [$Vkihybm3bccb->handler, $Vkihybm3bccb->variables];

            ++$Vgz2ahgrwzjk;
        }

        $Vkkdxriwdugo = '~^(?|' . implode('|', $Vkulgdd3i0xr) . ')$~';
        return ['regex' => $Vkkdxriwdugo, 'routeMap' => $Vbfuui5cpnkv];
    }
}
