<?php


namespace SebastianBergmann\Diff;

use SebastianBergmann\Diff\LCS\LongestCommonSubsequence;
use SebastianBergmann\Diff\LCS\TimeEfficientImplementation;
use SebastianBergmann\Diff\LCS\MemoryEfficientImplementation;


class Differ
{
    
    private $Vy5yyyefdntg;

    
    private $Vcouqukhw2qk;

    
    public function __construct($Vy5yyyefdntg = "--- Original\n+++ New\n", $Vcouqukhw2qk = true)
    {
        $this->header           = $Vy5yyyefdntg;
        $this->showNonDiffLines = $Vcouqukhw2qk;
    }

    
    public function diff($V2435fgfpotg, $Vusanxtmh52m, LongestCommonSubsequence $Vtfmfqwnk31y = null)
    {
        $V2435fgfpotg  = $this->validateDiffInput($V2435fgfpotg);
        $Vusanxtmh52m    = $this->validateDiffInput($Vusanxtmh52m);
        $Vlycelrz2ye5  = $this->diffToArray($V2435fgfpotg, $Vusanxtmh52m, $Vtfmfqwnk31y);
        $V2ysr50a4u4k   = $this->checkIfDiffInOld($Vlycelrz2ye5);
        $Vtpoxs3gutsc = isset($V2ysr50a4u4k[0]) ? $V2ysr50a4u4k[0] : 0;
        $Vppalz5j4b4w   = \count($Vlycelrz2ye5);

        if ($Vvurliuircct = \array_search($Vppalz5j4b4w, $V2ysr50a4u4k)) {
            $Vppalz5j4b4w = $Vvurliuircct;
        }

        return $this->getBuffer($Vlycelrz2ye5, $V2ysr50a4u4k, $Vtpoxs3gutsc, $Vppalz5j4b4w);
    }

    
    private function validateDiffInput($Vioma0xlpppc)
    {
        if (!\is_array($Vioma0xlpppc) && !\is_string($Vioma0xlpppc)) {
            return (string) $Vioma0xlpppc;
        }

        return $Vioma0xlpppc;
    }

    
    private function checkIfDiffInOld(array $Vlycelrz2ye5)
    {
        $Vxd10qkal2e0 = false;
        $Vxja1abp34yq     = 0;
        $V2ysr50a4u4k   = array();

        foreach ($Vlycelrz2ye5 as $Vrwsmtja4f2j) {
            if ($Vrwsmtja4f2j[1] === 0 ) {
                if ($Vxd10qkal2e0 === false) {
                    $Vxd10qkal2e0 = $Vxja1abp34yq;
                }
            } elseif ($Vxd10qkal2e0 !== false) {
                if (($Vxja1abp34yq - $Vxd10qkal2e0) > 5) {
                    $V2ysr50a4u4k[$Vxd10qkal2e0] = $Vxja1abp34yq - 1;
                }

                $Vxd10qkal2e0 = false;
            }

            ++$Vxja1abp34yq;
        }

        return $V2ysr50a4u4k;
    }

    
    private function getBuffer(array $Vlycelrz2ye5, array $V2ysr50a4u4k, $Vtpoxs3gutsc, $Vppalz5j4b4w)
    {
        $Vd3322ljwbqh = $this->header;

        if (!isset($V2ysr50a4u4k[$Vtpoxs3gutsc])) {
            $Vd3322ljwbqh = $this->getDiffBufferElementNew($Vlycelrz2ye5, $Vd3322ljwbqh, $Vtpoxs3gutsc);
            ++$Vtpoxs3gutsc;
        }

        for ($Vxja1abp34yq = $Vtpoxs3gutsc; $Vxja1abp34yq < $Vppalz5j4b4w; $Vxja1abp34yq++) {
            if (isset($V2ysr50a4u4k[$Vxja1abp34yq])) {
                $Vxja1abp34yq      = $V2ysr50a4u4k[$Vxja1abp34yq];
                $Vd3322ljwbqh = $this->getDiffBufferElementNew($Vlycelrz2ye5, $Vd3322ljwbqh, $Vxja1abp34yq);
            } else {
                $Vd3322ljwbqh = $this->getDiffBufferElement($Vlycelrz2ye5, $Vd3322ljwbqh, $Vxja1abp34yq);
            }
        }

        return $Vd3322ljwbqh;
    }

    
    private function getDiffBufferElement(array $Vlycelrz2ye5, $Vd3322ljwbqh, $Vlycelrz2ye5Index)
    {
        if ($Vlycelrz2ye5[$Vlycelrz2ye5Index][1] === 1 ) {
            $Vd3322ljwbqh .= '+' . $Vlycelrz2ye5[$Vlycelrz2ye5Index][0] . "\n";
        } elseif ($Vlycelrz2ye5[$Vlycelrz2ye5Index][1] === 2 ) {
            $Vd3322ljwbqh .= '-' . $Vlycelrz2ye5[$Vlycelrz2ye5Index][0] . "\n";
        } elseif ($this->showNonDiffLines === true) {
            $Vd3322ljwbqh .= ' ' . $Vlycelrz2ye5[$Vlycelrz2ye5Index][0] . "\n";
        }

        return $Vd3322ljwbqh;
    }

    
    private function getDiffBufferElementNew(array $Vlycelrz2ye5, $Vd3322ljwbqh, $Vlycelrz2ye5Index)
    {
        if ($this->showNonDiffLines === true) {
            $Vd3322ljwbqh .= "@@ @@\n";
        }

        return $this->getDiffBufferElement($Vlycelrz2ye5, $Vd3322ljwbqh, $Vlycelrz2ye5Index);
    }

    
    public function diffToArray($V2435fgfpotg, $Vusanxtmh52m, LongestCommonSubsequence $Vtfmfqwnk31y = null)
    {
        if (\is_string($V2435fgfpotg)) {
            $V2435fgfpotgMatches = $this->getNewLineMatches($V2435fgfpotg);
            $V2435fgfpotg        = $this->splitStringByLines($V2435fgfpotg);
        } elseif (\is_array($V2435fgfpotg)) {
            $V2435fgfpotgMatches = array();
        } else {
            throw new \InvalidArgumentException('"from" must be an array or string.');
        }

        if (\is_string($Vusanxtmh52m)) {
            $Vusanxtmh52mMatches = $this->getNewLineMatches($Vusanxtmh52m);
            $Vusanxtmh52m        = $this->splitStringByLines($Vusanxtmh52m);
        } elseif (\is_array($Vusanxtmh52m)) {
            $Vusanxtmh52mMatches = array();
        } else {
            throw new \InvalidArgumentException('"to" must be an array or string.');
        }

        list($V2435fgfpotg, $Vusanxtmh52m, $Vtpoxs3gutsc, $Vppalz5j4b4w) = self::getArrayDiffParted($V2435fgfpotg, $Vusanxtmh52m);

        if ($Vtfmfqwnk31y === null) {
            $Vtfmfqwnk31y = $this->selectLcsImplementation($V2435fgfpotg, $Vusanxtmh52m);
        }

        $V2dgbdurpgrt = $Vtfmfqwnk31y->calculate(\array_values($V2435fgfpotg), \array_values($Vusanxtmh52m));
        $Vlycelrz2ye5   = array();

        if ($this->detectUnmatchedLineEndings($V2435fgfpotgMatches, $Vusanxtmh52mMatches)) {
            $Vlycelrz2ye5[] = array(
                '#Warning: Strings contain different line endings!',
                0
            );
        }

        foreach ($Vtpoxs3gutsc as $Vusanxtmh52mken) {
            $Vlycelrz2ye5[] = array($Vusanxtmh52mken, 0 );
        }

        \reset($V2435fgfpotg);
        \reset($Vusanxtmh52m);

        foreach ($V2dgbdurpgrt as $Vusanxtmh52mken) {
            while (($V2435fgfpotgToken = \reset($V2435fgfpotg)) !== $Vusanxtmh52mken) {
                $Vlycelrz2ye5[] = array(\array_shift($V2435fgfpotg), 2 );
            }

            while (($Vusanxtmh52mToken = \reset($Vusanxtmh52m)) !== $Vusanxtmh52mken) {
                $Vlycelrz2ye5[] = array(\array_shift($Vusanxtmh52m), 1 );
            }

            $Vlycelrz2ye5[] = array($Vusanxtmh52mken, 0 );

            \array_shift($V2435fgfpotg);
            \array_shift($Vusanxtmh52m);
        }

        while (($Vusanxtmh52mken = \array_shift($V2435fgfpotg)) !== null) {
            $Vlycelrz2ye5[] = array($Vusanxtmh52mken, 2 );
        }

        while (($Vusanxtmh52mken = \array_shift($Vusanxtmh52m)) !== null) {
            $Vlycelrz2ye5[] = array($Vusanxtmh52mken, 1 );
        }

        foreach ($Vppalz5j4b4w as $Vusanxtmh52mken) {
            $Vlycelrz2ye5[] = array($Vusanxtmh52mken, 0 );
        }

        return $Vlycelrz2ye5;
    }

    
    private function getNewLineMatches($Ve5tcsso230g)
    {
        \preg_match_all('(\r\n|\r|\n)', $Ve5tcsso230g, $Ve5tcsso230gMatches);

        return $Ve5tcsso230gMatches;
    }

    
    private function splitStringByLines($Vioma0xlpppc)
    {
        return \preg_split('(\r\n|\r|\n)', $Vioma0xlpppc);
    }

    
    private function selectLcsImplementation(array $V2435fgfpotg, array $Vusanxtmh52m)
    {
        
        
        
        
        $Vyz3kkg4jqkp = 100 * 1024 * 1024;

        if ($this->calculateEstimatedFootprint($V2435fgfpotg, $Vusanxtmh52m) > $Vyz3kkg4jqkp) {
            return new MemoryEfficientImplementation;
        }

        return new TimeEfficientImplementation;
    }

    
    private function calculateEstimatedFootprint(array $V2435fgfpotg, array $Vusanxtmh52m)
    {
        $Vxja1abp34yqtemSize = PHP_INT_SIZE === 4 ? 76 : 144;

        return $Vxja1abp34yqtemSize * \pow(\min(\count($V2435fgfpotg), \count($Vusanxtmh52m)), 2);
    }

    
    private function detectUnmatchedLineEndings(array $V2435fgfpotgMatches, array $Vusanxtmh52mMatches)
    {
        return isset($V2435fgfpotgMatches[0], $Vusanxtmh52mMatches[0]) &&
               \count($V2435fgfpotgMatches[0]) === \count($Vusanxtmh52mMatches[0]) &&
               $V2435fgfpotgMatches[0] !== $Vusanxtmh52mMatches[0];
    }

    
    private static function getArrayDiffParted(array &$V2435fgfpotg, array &$Vusanxtmh52m)
    {
        $Vtpoxs3gutsc = array();
        $Vppalz5j4b4w   = array();

        \reset($Vusanxtmh52m);

        foreach ($V2435fgfpotg as $Vyiw1hdwmjmw => $V3jv1il2hqc3) {
            $Vusanxtmh52mK = \key($Vusanxtmh52m);

            if ($Vusanxtmh52mK === $Vyiw1hdwmjmw && $V3jv1il2hqc3 === $Vusanxtmh52m[$Vyiw1hdwmjmw]) {
                $Vtpoxs3gutsc[$Vyiw1hdwmjmw] = $V3jv1il2hqc3;

                unset($V2435fgfpotg[$Vyiw1hdwmjmw], $Vusanxtmh52m[$Vyiw1hdwmjmw]);
            } else {
                break;
            }
        }

        \end($V2435fgfpotg);
        \end($Vusanxtmh52m);

        do {
            $V2435fgfpotgK = \key($V2435fgfpotg);
            $Vusanxtmh52mK   = \key($Vusanxtmh52m);

            if (null === $V2435fgfpotgK || null === $Vusanxtmh52mK || \current($V2435fgfpotg) !== \current($Vusanxtmh52m)) {
                break;
            }

            \prev($V2435fgfpotg);
            \prev($Vusanxtmh52m);

            $Vppalz5j4b4w = array($V2435fgfpotgK => $V2435fgfpotg[$V2435fgfpotgK]) + $Vppalz5j4b4w;
            unset($V2435fgfpotg[$V2435fgfpotgK], $Vusanxtmh52m[$Vusanxtmh52mK]);
        } while (true);

        return array($V2435fgfpotg, $Vusanxtmh52m, $Vtpoxs3gutsc, $Vppalz5j4b4w);
    }
}
