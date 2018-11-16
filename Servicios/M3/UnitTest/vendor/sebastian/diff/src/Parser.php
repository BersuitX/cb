<?php


namespace SebastianBergmann\Diff;


class Parser
{
    
    public function parse($Ve5tcsso230g)
    {
        $Vbkt5laoakgf = \preg_split('(\r\n|\r|\n)', $Ve5tcsso230g);

        if (!empty($Vbkt5laoakgf) && $Vbkt5laoakgf[\count($Vbkt5laoakgf) - 1] == '') {
            \array_pop($Vbkt5laoakgf);
        }

        $V5ch20ovzidr = \count($Vbkt5laoakgf);
        $Vg3d5wpv40ke     = array();
        $Vlycelrz2ye5      = null;
        $Vlkfk1nifvwj = array();

        for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $V5ch20ovzidr; ++$Vxja1abp34yq) {
            if (\preg_match('(^---\\s+(?P<file>\\S+))', $Vbkt5laoakgf[$Vxja1abp34yq], $Vgdwj0txizct) &&
                \preg_match('(^\\+\\+\\+\\s+(?P<file>\\S+))', $Vbkt5laoakgf[$Vxja1abp34yq + 1], $V31i4kocebot)) {
                if ($Vlycelrz2ye5 !== null) {
                    $this->parseFileDiff($Vlycelrz2ye5, $Vlkfk1nifvwj);

                    $Vg3d5wpv40ke[]   = $Vlycelrz2ye5;
                    $Vlkfk1nifvwj = array();
                }

                $Vlycelrz2ye5 = new Diff($Vgdwj0txizct['file'], $V31i4kocebot['file']);

                ++$Vxja1abp34yq;
            } else {
                if (\preg_match('/^(?:diff --git |index [\da-f\.]+|[+-]{3} [ab])/', $Vbkt5laoakgf[$Vxja1abp34yq])) {
                    continue;
                }

                $Vlkfk1nifvwj[] = $Vbkt5laoakgf[$Vxja1abp34yq];
            }
        }

        if ($Vlycelrz2ye5 !== null && \count($Vlkfk1nifvwj)) {
            $this->parseFileDiff($Vlycelrz2ye5, $Vlkfk1nifvwj);

            $Vg3d5wpv40ke[] = $Vlycelrz2ye5;
        }

        return $Vg3d5wpv40ke;
    }

    
    private function parseFileDiff(Diff $Vlycelrz2ye5, array $Vbkt5laoakgf)
    {
        $Vhafyjzhwhdi = array();
        $Voiwceuvysis  = null;

        foreach ($Vbkt5laoakgf as $Vrwsmtja4f2j) {
            if (\preg_match('/^@@\s+-(?P<start>\d+)(?:,\s*(?P<startrange>\d+))?\s+\+(?P<end>\d+)(?:,\s*(?P<endrange>\d+))?\s+@@/', $Vrwsmtja4f2j, $Vwetg4hewdr4)) {
                $Voiwceuvysis = new Chunk(
                    $Vwetg4hewdr4['start'],
                    isset($Vwetg4hewdr4['startrange']) ? \max(1, $Vwetg4hewdr4['startrange']) : 1,
                    $Vwetg4hewdr4['end'],
                    isset($Vwetg4hewdr4['endrange']) ? \max(1, $Vwetg4hewdr4['endrange']) : 1
                );

                $Vhafyjzhwhdi[]  = $Voiwceuvysis;
                $Vlycelrz2ye5Lines = array();

                continue;
            }

            if (\preg_match('/^(?P<type>[+ -])?(?P<line>.*)/', $Vrwsmtja4f2j, $Vwetg4hewdr4)) {
                $V31qrja1w0r2 = Line::UNCHANGED;

                if ($Vwetg4hewdr4['type'] === '+') {
                    $V31qrja1w0r2 = Line::ADDED;
                } elseif ($Vwetg4hewdr4['type'] === '-') {
                    $V31qrja1w0r2 = Line::REMOVED;
                }

                $Vlycelrz2ye5Lines[] = new Line($V31qrja1w0r2, $Vwetg4hewdr4['line']);

                if (null !== $Voiwceuvysis) {
                    $Voiwceuvysis->setLines($Vlycelrz2ye5Lines);
                }
            }
        }

        $Vlycelrz2ye5->setChunks($Vhafyjzhwhdi);
    }
}
