<?php


namespace SebastianBergmann\Exporter;

use SebastianBergmann\RecursionContext\Context;


class Exporter
{
    
    public function export($Vcptarsq5qe4, $Vgnmq54cpxoo = 0)
    {
        return $this->recursiveExport($Vcptarsq5qe4, $Vgnmq54cpxoo);
    }

    
    public function shortenedRecursiveExport(&$Vqhzkfsafzrc, Context $Vylnw34ljlp1 = null)
    {
        $Vv0hyvhlkjqr   = array();
        $Vnqoiikqsyp5 = new self();

        if (!$Vylnw34ljlp1) {
            $Vylnw34ljlp1 = new Context;
        }

        $Vylnw34ljlp1->add($Vqhzkfsafzrc);

        foreach ($Vqhzkfsafzrc as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
            if (is_array($Vcptarsq5qe4)) {
                if ($Vylnw34ljlp1->contains($Vqhzkfsafzrc[$Vlpbz5aloxqt]) !== false) {
                    $Vv0hyvhlkjqr[] = '*RECURSION*';
                }

                else {
                    $Vv0hyvhlkjqr[] = sprintf(
                        'array(%s)',
                        $this->shortenedRecursiveExport($Vqhzkfsafzrc[$Vlpbz5aloxqt], $Vylnw34ljlp1)
                    );
                }
            }

            else {
                $Vv0hyvhlkjqr[] = $Vnqoiikqsyp5->shortenedExport($Vcptarsq5qe4);
            }
        }

        return implode(', ', $Vv0hyvhlkjqr);
    }

    
    public function shortenedExport($Vcptarsq5qe4)
    {
        if (is_string($Vcptarsq5qe4)) {
            $Ve5tcsso230g = $this->export($Vcptarsq5qe4);

            if (function_exists('mb_strlen')) {
                if (mb_strlen($Ve5tcsso230g) > 40) {
                    $Ve5tcsso230g = mb_substr($Ve5tcsso230g, 0, 30) . '...' . mb_substr($Ve5tcsso230g, -7);
                }
            } else {
                if (strlen($Ve5tcsso230g) > 40) {
                    $Ve5tcsso230g = substr($Ve5tcsso230g, 0, 30) . '...' . substr($Ve5tcsso230g, -7);
                }
            }

            return str_replace("\n", '\n', $Ve5tcsso230g);
        }

        if (is_object($Vcptarsq5qe4)) {
            return sprintf(
                '%s Object (%s)',
                get_class($Vcptarsq5qe4),
                count($this->toArray($Vcptarsq5qe4)) > 0 ? '...' : ''
            );
        }

        if (is_array($Vcptarsq5qe4)) {
            return sprintf(
                'Array (%s)',
                count($Vcptarsq5qe4) > 0 ? '...' : ''
            );
        }

        return $this->export($Vcptarsq5qe4);
    }

    
    public function toArray($Vcptarsq5qe4)
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

    
    protected function recursiveExport(&$Vcptarsq5qe4, $Vgnmq54cpxoo, $Vwmzchdebcks = null)
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
            
            if (preg_match('/[^\x09-\x0d\x1b\x20-\xff]/', $Vcptarsq5qe4)) {
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

            $Vlpbz5aloxqt    = $Vwmzchdebcks->add($Vcptarsq5qe4);
            $Vcptarsq5qe4s = '';

            if (count($Vcptarsq5qe4) > 0) {
                foreach ($Vcptarsq5qe4 as $Vyiw1hdwmjmw => $V3jv1il2hqc3) {
                    $Vcptarsq5qe4s .= sprintf(
                        '%s    %s => %s' . "\n",
                        $Vvdglquh4xbm,
                        $this->recursiveExport($Vyiw1hdwmjmw, $Vgnmq54cpxoo),
                        $this->recursiveExport($Vcptarsq5qe4[$Vyiw1hdwmjmw], $Vgnmq54cpxoo + 1, $Vwmzchdebcks)
                    );
                }

                $Vcptarsq5qe4s = "\n" . $Vcptarsq5qe4s . $Vvdglquh4xbm;
            }

            return sprintf('Array &%s (%s)', $Vlpbz5aloxqt, $Vcptarsq5qe4s);
        }

        if (is_object($Vcptarsq5qe4)) {
            $Vqmu1sajhgfn = get_class($Vcptarsq5qe4);

            if ($Vfrjid4vr3ci = $Vwmzchdebcks->contains($Vcptarsq5qe4)) {
                return sprintf('%s Object &%s', $Vqmu1sajhgfn, $Vfrjid4vr3ci);
            }

            $Vfrjid4vr3ci   = $Vwmzchdebcks->add($Vcptarsq5qe4);
            $Vcptarsq5qe4s = '';
            $Vvs0hc5bhqj3  = $this->toArray($Vcptarsq5qe4);

            if (count($Vvs0hc5bhqj3) > 0) {
                foreach ($Vvs0hc5bhqj3 as $Vyiw1hdwmjmw => $V3jv1il2hqc3) {
                    $Vcptarsq5qe4s .= sprintf(
                        '%s    %s => %s' . "\n",
                        $Vvdglquh4xbm,
                        $this->recursiveExport($Vyiw1hdwmjmw, $Vgnmq54cpxoo),
                        $this->recursiveExport($V3jv1il2hqc3, $Vgnmq54cpxoo + 1, $Vwmzchdebcks)
                    );
                }

                $Vcptarsq5qe4s = "\n" . $Vcptarsq5qe4s . $Vvdglquh4xbm;
            }

            return sprintf('%s Object &%s (%s)', $Vqmu1sajhgfn, $Vfrjid4vr3ci, $Vcptarsq5qe4s);
        }

        return var_export($Vcptarsq5qe4, true);
    }
}
