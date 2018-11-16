<?php


namespace SebastianBergmann\Diff\LCS;


class TimeEfficientImplementation implements LongestCommonSubsequence
{
    
    public function calculate(array $V2435fgfpotg, array $Vusanxtmh52m)
    {
        $V2dgbdurpgrt     = array();
        $V2435fgfpotgLength = \count($V2435fgfpotg);
        $Vusanxtmh52mLength   = \count($Vusanxtmh52m);
        $Viki5vg11beg      = $V2435fgfpotgLength + 1;
        $Vcvpmziniqjd     = new \SplFixedArray($Viki5vg11beg * ($Vusanxtmh52mLength + 1));

        for ($Vxja1abp34yq = 0; $Vxja1abp34yq <= $V2435fgfpotgLength; ++$Vxja1abp34yq) {
            $Vcvpmziniqjd[$Vxja1abp34yq] = 0;
        }

        for ($V5kfw3q1o1vh = 0; $V5kfw3q1o1vh <= $Vusanxtmh52mLength; ++$V5kfw3q1o1vh) {
            $Vcvpmziniqjd[$V5kfw3q1o1vh * $Viki5vg11beg] = 0;
        }

        for ($Vxja1abp34yq = 1; $Vxja1abp34yq <= $V2435fgfpotgLength; ++$Vxja1abp34yq) {
            for ($V5kfw3q1o1vh = 1; $V5kfw3q1o1vh <= $Vusanxtmh52mLength; ++$V5kfw3q1o1vh) {
                $Vgcvauwd5u5t          = ($V5kfw3q1o1vh * $Viki5vg11beg) + $Vxja1abp34yq;
                $Vcvpmziniqjd[$Vgcvauwd5u5t] = \max(
                    $Vcvpmziniqjd[$Vgcvauwd5u5t - 1],
                    $Vcvpmziniqjd[$Vgcvauwd5u5t - $Viki5vg11beg],
                    $V2435fgfpotg[$Vxja1abp34yq - 1] === $Vusanxtmh52m[$V5kfw3q1o1vh - 1] ? $Vcvpmziniqjd[$Vgcvauwd5u5t - $Viki5vg11beg - 1] + 1 : 0
                );
            }
        }

        $Vxja1abp34yq = $V2435fgfpotgLength;
        $V5kfw3q1o1vh = $Vusanxtmh52mLength;

        while ($Vxja1abp34yq > 0 && $V5kfw3q1o1vh > 0) {
            if ($V2435fgfpotg[$Vxja1abp34yq - 1] === $Vusanxtmh52m[$V5kfw3q1o1vh - 1]) {
                $V2dgbdurpgrt[] = $V2435fgfpotg[$Vxja1abp34yq - 1];
                --$Vxja1abp34yq;
                --$V5kfw3q1o1vh;
            } else {
                $Vgcvauwd5u5t = ($V5kfw3q1o1vh * $Viki5vg11beg) + $Vxja1abp34yq;

                if ($Vcvpmziniqjd[$Vgcvauwd5u5t - $Viki5vg11beg] > $Vcvpmziniqjd[$Vgcvauwd5u5t - 1]) {
                    --$V5kfw3q1o1vh;
                } else {
                    --$Vxja1abp34yq;
                }
            }
        }

        return \array_reverse($V2dgbdurpgrt);
    }
}
