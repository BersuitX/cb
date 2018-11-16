<?php


namespace SebastianBergmann\Comparator;


class ArrayComparator extends Comparator
{
    
    public function accepts($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        return is_array($Vwcb1oykhumm) && is_array($Vs4nw03sqcam);
    }

    
    public function assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m = 0.0, $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false, array &$Vwmzchdebcks = array())
    {
        if ($Vgxxhufhstfx) {
            sort($Vwcb1oykhumm);
            sort($Vs4nw03sqcam);
        }

        $Vupq0siar3w5 = $Vs4nw03sqcam;
        $V5cgyv4qa350 = $Vt0vfdutyx1e = "Array (\n";
        $V0qcmnngtslh     = true;

        foreach ($Vwcb1oykhumm as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
            unset($Vupq0siar3w5[$Vlpbz5aloxqt]);

            if (!array_key_exists($Vlpbz5aloxqt, $Vs4nw03sqcam)) {
                $V5cgyv4qa350 .= sprintf(
                    "    %s => %s\n",
                    $this->exporter->export($Vlpbz5aloxqt),
                    $this->exporter->shortenedExport($Vcptarsq5qe4)
                );

                $V0qcmnngtslh = false;

                continue;
            }

            try {
                $V23fl2cvtaex = $this->factory->getComparatorFor($Vcptarsq5qe4, $Vs4nw03sqcam[$Vlpbz5aloxqt]);
                $V23fl2cvtaex->assertEquals($Vcptarsq5qe4, $Vs4nw03sqcam[$Vlpbz5aloxqt], $Vxo5kvys4l4m, $Vgxxhufhstfx, $V2tcbx0tpkh3, $Vwmzchdebcks);

                $V5cgyv4qa350 .= sprintf(
                    "    %s => %s\n",
                    $this->exporter->export($Vlpbz5aloxqt),
                    $this->exporter->shortenedExport($Vcptarsq5qe4)
                );
                $Vt0vfdutyx1e .= sprintf(
                    "    %s => %s\n",
                    $this->exporter->export($Vlpbz5aloxqt),
                    $this->exporter->shortenedExport($Vs4nw03sqcam[$Vlpbz5aloxqt])
                );
            } catch (ComparisonFailure $Vpt32vvhspnv) {
                $V5cgyv4qa350 .= sprintf(
                    "    %s => %s\n",
                    $this->exporter->export($Vlpbz5aloxqt),
                    $Vpt32vvhspnv->getExpectedAsString()
                    ? $this->indent($Vpt32vvhspnv->getExpectedAsString())
                    : $this->exporter->shortenedExport($Vpt32vvhspnv->getExpected())
                );

                $Vt0vfdutyx1e .= sprintf(
                    "    %s => %s\n",
                    $this->exporter->export($Vlpbz5aloxqt),
                    $Vpt32vvhspnv->getActualAsString()
                    ? $this->indent($Vpt32vvhspnv->getActualAsString())
                    : $this->exporter->shortenedExport($Vpt32vvhspnv->getActual())
                );

                $V0qcmnngtslh = false;
            }
        }

        foreach ($Vupq0siar3w5 as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
            $Vt0vfdutyx1e .= sprintf(
                "    %s => %s\n",
                $this->exporter->export($Vlpbz5aloxqt),
                $this->exporter->shortenedExport($Vcptarsq5qe4)
            );

            $V0qcmnngtslh = false;
        }

        $V5cgyv4qa350 .= ')';
        $Vt0vfdutyx1e .= ')';

        if (!$V0qcmnngtslh) {
            throw new ComparisonFailure(
                $Vwcb1oykhumm,
                $Vs4nw03sqcam,
                $V5cgyv4qa350,
                $Vt0vfdutyx1e,
                false,
                'Failed asserting that two arrays are equal.'
            );
        }
    }

    protected function indent($Vbkt5laoakgf)
    {
        return trim(str_replace("\n", "\n    ", $Vbkt5laoakgf));
    }
}
