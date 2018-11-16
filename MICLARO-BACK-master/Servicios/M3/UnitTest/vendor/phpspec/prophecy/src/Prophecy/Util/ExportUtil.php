<?php

namespace Prophecy\Util;

use Prophecy\Prophecy\ProphecyInterface;
use SebastianBergmann\RecursionContext\Context;




class ExportUtil
{
    
    public static function export($Vcptarsq5qe4, $Vgnmq54cpxoo = 0)
    {
        return self::recursiveExport($Vcptarsq5qe4, $Vgnmq54cpxoo);
    }

    
    public static function toArray($Vcptarsq5qe4)
    {
        if (!is_object($Vcptarsq5qe4)) {
            return (array) $Vcptarsq5qe4;
        }

        $Vvs0hc5bhqj3 = array();

        foreach ((array) $Vcptarsq5qe4 as $Vlpbz5aloxqt => $Vesnpsejyhuw) {
            
            
            
            
            if (preg_match('/^\0.+\0(.+)$/', $Vlpbz5aloxqt, $Virbphhh55ue)) {
                $Vlpbz5aloxqt = $Virbphhh55ue[1];
            }

            
            if ($Vlpbz5aloxqt === "\0gcdata") {
                continue;
            }

            $Vvs0hc5bhqj3[$Vlpbz5aloxqt] = $Vesnpsejyhuw;
        }

        
        
        
        if ($Vcptarsq5qe4 instanceof \SplObjectStorage) {
            
            
            if (property_exists('\SplObjectStorage', '__storage')) {
                unset($Vvs0hc5bhqj3['__storage']);
            } elseif (property_exists('\SplObjectStorage', 'storage')) {
                unset($Vvs0hc5bhqj3['storage']);
            }

            if (property_exists('\SplObjectStorage', '__key')) {
                unset($Vvs0hc5bhqj3['__key']);
            }

            foreach ($Vcptarsq5qe4 as $Vlpbz5aloxqt => $Vesnpsejyhuw) {
                $Vvs0hc5bhqj3[spl_object_hash($Vesnpsejyhuw)] = array(
                    'obj' => $Vesnpsejyhuw,
                    'inf' => $Vcptarsq5qe4->getInfo(),
                );
            }
        }

        return $Vvs0hc5bhqj3;
    }

    
    protected static function recursiveExport(&$Vcptarsq5qe4, $Vgnmq54cpxoo, $Vwmzchdebcks = null)
    {
        if ($Vcptarsq5qe4 === null) {
            return 'null';
        }

        if ($Vcptarsq5qe4 === true) {
            return 'true';
        }

        if ($Vcptarsq5qe4 === false) {
            return 'false';
        }

        if (is_float($Vcptarsq5qe4) && floatval(intval($Vcptarsq5qe4)) === $Vcptarsq5qe4) {
            return "$Vcptarsq5qe4.0";
        }

        if (is_resource($Vcptarsq5qe4)) {
            return sprintf(
                'resource(%d) of type (%s)',
                $Vcptarsq5qe4,
                get_resource_type($Vcptarsq5qe4)
            );
        }

        if (is_string($Vcptarsq5qe4)) {
            
            if (preg_match('/[^\x09-\x0d\x20-\xff]/', $Vcptarsq5qe4)) {
                return 'Binary String: 0x' . bin2hex($Vcptarsq5qe4);
            }

            return "'" .
            str_replace(array("\r\n", "\n\r", "\r"), array("\n", "\n", "\n"), $Vcptarsq5qe4) .
            "'";
        }

        $Vvdglquh4xbm = str_repeat(' ', 4 * $Vgnmq54cpxoo);

        if (!$Vwmzchdebcks) {
            $Vwmzchdebcks = new Context;
        }

        if (is_array($Vcptarsq5qe4)) {
            if (($Vlpbz5aloxqt = $Vwmzchdebcks->contains($Vcptarsq5qe4)) !== false) {
                return 'Array &' . $Vlpbz5aloxqt;
            }

            $Vvs0hc5bhqj3  = $Vcptarsq5qe4;
            $Vlpbz5aloxqt    = $Vwmzchdebcks->add($Vcptarsq5qe4);
            $Vcptarsq5qe4s = '';

            if (count($Vvs0hc5bhqj3) > 0) {
                foreach ($Vvs0hc5bhqj3 as $Vyiw1hdwmjmw => $V3jv1il2hqc3) {
                    $Vcptarsq5qe4s .= sprintf(
                        '%s    %s => %s' . "\n",
                        $Vvdglquh4xbm,
                        self::recursiveExport($Vyiw1hdwmjmw, $Vgnmq54cpxoo),
                        self::recursiveExport($Vcptarsq5qe4[$Vyiw1hdwmjmw], $Vgnmq54cpxoo + 1, $Vwmzchdebcks)
                    );
                }

                $Vcptarsq5qe4s = "\n" . $Vcptarsq5qe4s . $Vvdglquh4xbm;
            }

            return sprintf('Array &%s (%s)', $Vlpbz5aloxqt, $Vcptarsq5qe4s);
        }

        if (is_object($Vcptarsq5qe4)) {
            $Vqmu1sajhgfn = get_class($Vcptarsq5qe4);

            if ($Vcptarsq5qe4 instanceof ProphecyInterface) {
                return sprintf('%s Object (*Prophecy*)', $Vqmu1sajhgfn);
            } elseif ($Vfrjid4vr3ci = $Vwmzchdebcks->contains($Vcptarsq5qe4)) {
                return sprintf('%s:%s Object', $Vqmu1sajhgfn, $Vfrjid4vr3ci);
            }

            $Vfrjid4vr3ci   = $Vwmzchdebcks->add($Vcptarsq5qe4);
            $Vcptarsq5qe4s = '';
            $Vvs0hc5bhqj3  = self::toArray($Vcptarsq5qe4);

            if (count($Vvs0hc5bhqj3) > 0) {
                foreach ($Vvs0hc5bhqj3 as $Vyiw1hdwmjmw => $V3jv1il2hqc3) {
                    $Vcptarsq5qe4s .= sprintf(
                        '%s    %s => %s' . "\n",
                        $Vvdglquh4xbm,
                        self::recursiveExport($Vyiw1hdwmjmw, $Vgnmq54cpxoo),
                        self::recursiveExport($V3jv1il2hqc3, $Vgnmq54cpxoo + 1, $Vwmzchdebcks)
                    );
                }

                $Vcptarsq5qe4s = "\n" . $Vcptarsq5qe4s . $Vvdglquh4xbm;
            }

            return sprintf('%s:%s Object (%s)', $Vqmu1sajhgfn, $Vfrjid4vr3ci, $Vcptarsq5qe4s);
        }

        return var_export($Vcptarsq5qe4, true);
    }
}
