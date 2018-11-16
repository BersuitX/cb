<?php



class PHP_CodeCoverage_Report_Crap4j
{
    
    private $Vyaixclyzeac;

    
    public function __construct($Vyaixclyzeac = 30)
    {
        if (!is_int($Vyaixclyzeac)) {
            throw PHP_CodeCoverage_Util_InvalidArgumentHelper::factory(
                1,
                'integer'
            );
        }

        $this->threshold = $Vyaixclyzeac;
    }

    
    public function process(PHP_CodeCoverage $Vbt1bqdir3su, $Vec3c2fwpbib = null, $Vgpjmw221p0b = null)
    {
        $Vn3u2xbvygpr               = new DOMDocument('1.0', 'UTF-8');
        $Vn3u2xbvygpr->formatOutput = true;

        $Vixd4iv51rfm = $Vn3u2xbvygpr->createElement('crap_result');
        $Vn3u2xbvygpr->appendChild($Vixd4iv51rfm);

        $V43ee3vldohf = $Vn3u2xbvygpr->createElement('project', is_string($Vgpjmw221p0b) ? $Vgpjmw221p0b : '');
        $Vixd4iv51rfm->appendChild($V43ee3vldohf);
        $Vixd4iv51rfm->appendChild($Vn3u2xbvygpr->createElement('timestamp', date('Y-m-d H:i:s', (int) $_SERVER['REQUEST_TIME'])));

        $Vyb3p3me1y3d       = $Vn3u2xbvygpr->createElement('stats');
        $Vdocb5jgiq1n = $Vn3u2xbvygpr->createElement('methods');

        $Vem32crslzoa = $Vbt1bqdir3su->getReport();
        unset($Vbt1bqdir3su);

        $Vfuurooijlrl     = 0;
        $Veu5ytwp3rkr = 0;
        $Vkwjkfajfmvy        = 0;
        $Vyletr1q1mi1            = 0;

        foreach ($Vem32crslzoa as $Virsew13xpli) {
            $Vgpjmw221p0bspace = 'global';

            if (!$Virsew13xpli instanceof PHP_CodeCoverage_Report_Node_File) {
                continue;
            }

            $Vpu3xl4uhgg5 = $Vn3u2xbvygpr->createElement('file');
            $Vpu3xl4uhgg5->setAttribute('name', $Virsew13xpli->getPath());

            $Vcoznk2huoff = $Virsew13xpli->getClassesAndTraits();

            foreach ($Vcoznk2huoff as $Vh0iae5cev4i => $Vqmu1sajhgfn) {
                foreach ($Vqmu1sajhgfn['methods'] as $Vc1exo5hbki5 => $Vtlfvdwskdge) {
                    $Vt522rp0vehp = $this->getCrapLoad($Vtlfvdwskdge['crap'], $Vtlfvdwskdge['ccn'], $Vtlfvdwskdge['coverage']);

                    $Vyletr1q1mi1     += $Vtlfvdwskdge['crap'];
                    $Vkwjkfajfmvy += $Vt522rp0vehp;
                    $Vfuurooijlrl++;

                    if ($Vtlfvdwskdge['crap'] >= $this->threshold) {
                        $Veu5ytwp3rkr++;
                    }

                    $VtlfvdwskdgeNode = $Vn3u2xbvygpr->createElement('method');

                    if (!empty($Vqmu1sajhgfn['package']['namespace'])) {
                        $Vgpjmw221p0bspace = $Vqmu1sajhgfn['package']['namespace'];
                    }

                    $VtlfvdwskdgeNode->appendChild($Vn3u2xbvygpr->createElement('package', $Vgpjmw221p0bspace));
                    $VtlfvdwskdgeNode->appendChild($Vn3u2xbvygpr->createElement('className', $Vh0iae5cev4i));
                    $VtlfvdwskdgeNode->appendChild($Vn3u2xbvygpr->createElement('methodName', $Vc1exo5hbki5));
                    $VtlfvdwskdgeNode->appendChild($Vn3u2xbvygpr->createElement('methodSignature', htmlspecialchars($Vtlfvdwskdge['signature'])));
                    $VtlfvdwskdgeNode->appendChild($Vn3u2xbvygpr->createElement('fullMethod', htmlspecialchars($Vtlfvdwskdge['signature'])));
                    $VtlfvdwskdgeNode->appendChild($Vn3u2xbvygpr->createElement('crap', $this->roundValue($Vtlfvdwskdge['crap'])));
                    $VtlfvdwskdgeNode->appendChild($Vn3u2xbvygpr->createElement('complexity', $Vtlfvdwskdge['ccn']));
                    $VtlfvdwskdgeNode->appendChild($Vn3u2xbvygpr->createElement('coverage', $this->roundValue($Vtlfvdwskdge['coverage'])));
                    $VtlfvdwskdgeNode->appendChild($Vn3u2xbvygpr->createElement('crapLoad', round($Vt522rp0vehp)));

                    $Vdocb5jgiq1n->appendChild($VtlfvdwskdgeNode);
                }
            }
        }

        $Vyb3p3me1y3d->appendChild($Vn3u2xbvygpr->createElement('name', 'Method Crap Stats'));
        $Vyb3p3me1y3d->appendChild($Vn3u2xbvygpr->createElement('methodCount', $Vfuurooijlrl));
        $Vyb3p3me1y3d->appendChild($Vn3u2xbvygpr->createElement('crapMethodCount', $Veu5ytwp3rkr));
        $Vyb3p3me1y3d->appendChild($Vn3u2xbvygpr->createElement('crapLoad', round($Vkwjkfajfmvy)));
        $Vyb3p3me1y3d->appendChild($Vn3u2xbvygpr->createElement('totalCrap', $Vyletr1q1mi1));

        if ($Vfuurooijlrl > 0) {
            $Vgtk2xjgvpm1 = $this->roundValue((100 * $Veu5ytwp3rkr) / $Vfuurooijlrl);
        } else {
            $Vgtk2xjgvpm1 = 0;
        }

        $Vyb3p3me1y3d->appendChild($Vn3u2xbvygpr->createElement('crapMethodPercent', $Vgtk2xjgvpm1));

        $Vixd4iv51rfm->appendChild($Vyb3p3me1y3d);
        $Vixd4iv51rfm->appendChild($Vdocb5jgiq1n);

        if ($Vec3c2fwpbib !== null) {
            if (!is_dir(dirname($Vec3c2fwpbib))) {
                mkdir(dirname($Vec3c2fwpbib), 0777, true);
            }

            return $Vn3u2xbvygpr->save($Vec3c2fwpbib);
        } else {
            return $Vn3u2xbvygpr->saveXML();
        }
    }

    
    private function getCrapLoad($Vqo5zinbbsz4, $V4daj1uynlbs, $Vbt1bqdir3suPercent)
    {
        $Vt522rp0vehp = 0;

        if ($Vqo5zinbbsz4 >= $this->threshold) {
            $Vt522rp0vehp += $V4daj1uynlbs * (1.0 - $Vbt1bqdir3suPercent / 100);
            $Vt522rp0vehp += $V4daj1uynlbs / $this->threshold;
        }

        return $Vt522rp0vehp;
    }

    
    private function roundValue($Vcptarsq5qe4)
    {
        return round($Vcptarsq5qe4, 2);
    }
}
