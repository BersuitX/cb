<?php

namespace FastRoute\DataGenerator;

class CharCountBased extends RegexBasedAbstract
{
    protected function getApproxChunkSize()
    {
        return 30;
    }

    protected function processChunk($Vyd5mz3mqz24)
    {
        $Vbfuui5cpnkv = [];
        $Vkulgdd3i0xr = [];

        $Vdobkxuay5xk = 0;
        $V52q32upexbe = '';
        $Vdbkece3gnp5 = count($Vyd5mz3mqz24);
        foreach ($Vyd5mz3mqz24 as $Vkkdxriwdugo => $Vkihybm3bccb) {
            $Vdobkxuay5xk++;
            $V52q32upexbe .= "\t";

            $Vkulgdd3i0xr[] = '(?:' . $Vkkdxriwdugo . '/(\t{' . $Vdobkxuay5xk . '})\t{' . ($Vdbkece3gnp5 - $Vdobkxuay5xk) . '})';
            $Vbfuui5cpnkv[$V52q32upexbe] = [$Vkihybm3bccb->handler, $Vkihybm3bccb->variables];
        }

        $Vkkdxriwdugo = '~^(?|' . implode('|', $Vkulgdd3i0xr) . ')$~';
        return ['regex' => $Vkkdxriwdugo, 'suffix' => '/' . $V52q32upexbe, 'routeMap' => $Vbfuui5cpnkv];
    }
}
