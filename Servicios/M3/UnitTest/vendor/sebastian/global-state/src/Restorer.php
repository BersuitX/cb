<?php


namespace SebastianBergmann\GlobalState;

use ReflectionProperty;


class Restorer
{
    
    public function restoreFunctions(Snapshot $V5idjdtohxgf)
    {
        if (!function_exists('uopz_delete')) {
            throw new RuntimeException('The uopz_delete() function is required for this operation');
        }

        $V1smq0dxjwv1 = get_defined_functions();

        foreach (array_diff($V1smq0dxjwv1['user'], $V5idjdtohxgf->functions()) as $Vi5khqarjczp) {
            uopz_delete($Vi5khqarjczp);
        }
    }

    
    public function restoreGlobalVariables(Snapshot $V5idjdtohxgf)
    {
        $Vegehlmzhwsn = $V5idjdtohxgf->superGlobalArrays();

        foreach ($Vegehlmzhwsn as $Vpl2mc1wl5wt) {
            $this->restoreSuperGlobalArray($V5idjdtohxgf, $Vpl2mc1wl5wt);
        }

        $Vyfqsmk1cf1s = $V5idjdtohxgf->globalVariables();

        foreach (array_keys($GLOBALS) as $Vlpbz5aloxqt) {
            if ($Vlpbz5aloxqt != 'GLOBALS' &&
                !in_array($Vlpbz5aloxqt, $Vegehlmzhwsn) &&
                !$V5idjdtohxgf->blacklist()->isGlobalVariableBlacklisted($Vlpbz5aloxqt)) {
                if (isset($Vyfqsmk1cf1s[$Vlpbz5aloxqt])) {
                    $GLOBALS[$Vlpbz5aloxqt] = $Vyfqsmk1cf1s[$Vlpbz5aloxqt];
                } else {
                    unset($GLOBALS[$Vlpbz5aloxqt]);
                }
            }
        }
    }

    
    public function restoreStaticAttributes(Snapshot $V5idjdtohxgf)
    {
        $Vr1xdnxdcb52    = new Snapshot($V5idjdtohxgf->blacklist(), false, false, false, false, true, false, false, false, false);
        $Vvwjulao25mj = array_diff($Vr1xdnxdcb52->classes(), $V5idjdtohxgf->classes());
        unset($Vr1xdnxdcb52);

        foreach ($V5idjdtohxgf->staticAttributes() as $Vh0iae5cev4i => $V5g41w4jzcol) {
            foreach ($V5g41w4jzcol as $Vgpjmw221p0b => $Vcptarsq5qe4) {
                $Vf4nbpoij40n = new ReflectionProperty($Vh0iae5cev4i, $Vgpjmw221p0b);
                $Vf4nbpoij40n->setAccessible(true);
                $Vf4nbpoij40n->setValue($Vcptarsq5qe4);
            }
        }

        foreach ($Vvwjulao25mj as $Vh0iae5cev4i) {
            $Vqmu1sajhgfn    = new \ReflectionClass($Vh0iae5cev4i);
            $Vaahcuu04siz = $Vqmu1sajhgfn->getDefaultProperties();

            foreach ($Vqmu1sajhgfn->getProperties() as $Vxw4jdz2m4w0) {
                if (!$Vxw4jdz2m4w0->isStatic()) {
                    continue;
                }

                $Vgpjmw221p0b = $Vxw4jdz2m4w0->getName();

                if ($V5idjdtohxgf->blacklist()->isStaticAttributeBlacklisted($Vh0iae5cev4i, $Vgpjmw221p0b)) {
                    continue;
                }

                if (!isset($Vaahcuu04siz[$Vgpjmw221p0b])) {
                    continue;
                }

                $Vxw4jdz2m4w0->setAccessible(true);
                $Vxw4jdz2m4w0->setValue($Vaahcuu04siz[$Vgpjmw221p0b]);
            }
        }
    }

    
    private function restoreSuperGlobalArray(Snapshot $V5idjdtohxgf, $Vpl2mc1wl5wt)
    {
        $Vpksvlby2q1c = $V5idjdtohxgf->superGlobalVariables();

        if (isset($GLOBALS[$Vpl2mc1wl5wt]) &&
            is_array($GLOBALS[$Vpl2mc1wl5wt]) &&
            isset($Vpksvlby2q1c[$Vpl2mc1wl5wt])) {
            $Vlpbz5aloxqts = array_keys(
                array_merge(
                    $GLOBALS[$Vpl2mc1wl5wt],
                    $Vpksvlby2q1c[$Vpl2mc1wl5wt]
                )
            );

            foreach ($Vlpbz5aloxqts as $Vlpbz5aloxqt) {
                if (isset($Vpksvlby2q1c[$Vpl2mc1wl5wt][$Vlpbz5aloxqt])) {
                    $GLOBALS[$Vpl2mc1wl5wt][$Vlpbz5aloxqt] = $Vpksvlby2q1c[$Vpl2mc1wl5wt][$Vlpbz5aloxqt];
                } else {
                    unset($GLOBALS[$Vpl2mc1wl5wt][$Vlpbz5aloxqt]);
                }
            }
        }
    }
}
