<?php


namespace SebastianBergmann\Diff\LCS;


class MemoryEfficientImplementation implements LongestCommonSubsequence
{
    
    public function calculate(array $V2435fgfpotg, array $Vusanxtmh52m)
    {
        $Vhhrx0p33orq = \count($V2435fgfpotg);
        $Vrgyqfjacmrj   = \count($Vusanxtmh52m);

        if ($Vhhrx0p33orq === 0) {
            return array();
        }

        if ($Vhhrx0p33orq === 1) {
            if (\in_array($V2435fgfpotg[0], $Vusanxtmh52m, true)) {
                return array($V2435fgfpotg[0]);
            }

            return array();
        }

        $Vxja1abp34yq         = (int) ($Vhhrx0p33orq / 2);
        $V2435fgfpotgStart = \array_slice($V2435fgfpotg, 0, $Vxja1abp34yq);
        $V2435fgfpotgEnd   = \array_slice($V2435fgfpotg, $Vxja1abp34yq);
        $Vj1fkxo5oab4       = $this->length($V2435fgfpotgStart, $Vusanxtmh52m);
        $Vnlshkfd5tjq       = $this->length(\array_reverse($V2435fgfpotgEnd), \array_reverse($Vusanxtmh52m));
        $Vnkz44ni2bve      = 0;
        $Vbulqadoj2ef       = 0;

        for ($V5kfw3q1o1vh = 0; $V5kfw3q1o1vh <= $Vrgyqfjacmrj; $V5kfw3q1o1vh++) {
            $Vdkn4fegqyrf = $Vj1fkxo5oab4[$V5kfw3q1o1vh] + $Vnlshkfd5tjq[$Vrgyqfjacmrj - $V5kfw3q1o1vh];

            if ($Vdkn4fegqyrf >= $Vbulqadoj2ef) {
                $Vbulqadoj2ef  = $Vdkn4fegqyrf;
                $Vnkz44ni2bve = $V5kfw3q1o1vh;
            }
        }

        $Vusanxtmh52mStart = \array_slice($Vusanxtmh52m, 0, $Vnkz44ni2bve);
        $Vusanxtmh52mEnd   = \array_slice($Vusanxtmh52m, $Vnkz44ni2bve);

        return \array_merge(
            $this->calculate($V2435fgfpotgStart, $Vusanxtmh52mStart),
            $this->calculate($V2435fgfpotgEnd, $Vusanxtmh52mEnd)
        );
    }

    
    private function length(array $V2435fgfpotg, array $Vusanxtmh52m)
    {
        $Vr1xdnxdcb52 = \array_fill(0, \count($Vusanxtmh52m) + 1, 0);
        $Vhhrx0p33orq   = \count($V2435fgfpotg);
        $Vrgyqfjacmrj     = \count($Vusanxtmh52m);

        for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vhhrx0p33orq; $Vxja1abp34yq++) {
            $Vex3z411fxne = $Vr1xdnxdcb52;

            for ($V5kfw3q1o1vh = 0; $V5kfw3q1o1vh < $Vrgyqfjacmrj; $V5kfw3q1o1vh++) {
                if ($V2435fgfpotg[$Vxja1abp34yq] === $Vusanxtmh52m[$V5kfw3q1o1vh]) {
                    $Vr1xdnxdcb52[$V5kfw3q1o1vh + 1] = $Vex3z411fxne[$V5kfw3q1o1vh] + 1;
                } else {
                    $Vr1xdnxdcb52[$V5kfw3q1o1vh + 1] = \max($Vr1xdnxdcb52[$V5kfw3q1o1vh], $Vex3z411fxne[$V5kfw3q1o1vh + 1]);
                }
            }
        }

        return $Vr1xdnxdcb52;
    }
}
