<?php


namespace SebastianBergmann\GlobalState;


class CodeExporter
{
    
    public function constants(Snapshot $V5idjdtohxgf)
    {
        $Vv0hyvhlkjqr = '';

        foreach ($V5idjdtohxgf->constants() as $Vgpjmw221p0b => $Vcptarsq5qe4) {
            $Vv0hyvhlkjqr .= sprintf(
                'if (!defined(\'%s\')) define(\'%s\', %s);' . "\n",
                $Vgpjmw221p0b,
                $Vgpjmw221p0b,
                $this->exportVariable($Vcptarsq5qe4)
            );
        }

        return $Vv0hyvhlkjqr;
    }

    
    public function iniSettings(Snapshot $V5idjdtohxgf)
    {
        $Vv0hyvhlkjqr = '';

        foreach ($V5idjdtohxgf->iniSettings() as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
            $Vv0hyvhlkjqr .= sprintf(
                '@ini_set(%s, %s);' . "\n",
                $this->exportVariable($Vlpbz5aloxqt),
                $this->exportVariable($Vcptarsq5qe4)
            );
        }

        return $Vv0hyvhlkjqr;
    }

    
    private function exportVariable($Vxjof1iqtr44)
    {
        if (is_scalar($Vxjof1iqtr44) || is_null($Vxjof1iqtr44) ||
            (is_array($Vxjof1iqtr44) && $this->arrayOnlyContainsScalars($Vxjof1iqtr44))) {
            return var_export($Vxjof1iqtr44, true);
        }

        return 'unserialize(' . var_export(serialize($Vxjof1iqtr44), true) . ')';
    }

    
    private function arrayOnlyContainsScalars(array $Vvs0hc5bhqj3)
    {
        $Vv0hyvhlkjqr = true;

        foreach ($Vvs0hc5bhqj3 as $Vbzemolr5akx) {
            if (is_array($Vbzemolr5akx)) {
                $Vv0hyvhlkjqr = self::arrayOnlyContainsScalars($Vbzemolr5akx);
            } elseif (!is_scalar($Vbzemolr5akx) && !is_null($Vbzemolr5akx)) {
                $Vv0hyvhlkjqr = false;
            }

            if ($Vv0hyvhlkjqr === false) {
                break;
            }
        }

        return $Vv0hyvhlkjqr;
    }
}
